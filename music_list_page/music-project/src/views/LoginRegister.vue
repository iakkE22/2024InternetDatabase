<template>
  <div class="login-register-container">
    <div class="box">
       <!-- Logo 部分 -->
       <div class="logo-section">
        <div class="logo">
          <img src="\music-project\assets\images\sys_pic\chill.png" alt="Logo" />
          <h1>Chillguy Music</h1>
        </div>
      </div>

      <div class="form-section">
        <div class="tabs">
          <button :class="{ active: isLogin }" @click="switchToLogin">Log In</button>
          <button :class="{ active: !isLogin }" @click="switchToRegister">Log Up</button>
        </div>

        <!-- 登录表单 -->
        <form v-if="isLogin" @submit.prevent="handleLogin">
          <h1>Log In</h1>
          <p>Welcome back! Please enter your details.</p>
          <div class="form-group">
            <label for="login-username">Username</label>
            <input
              type="text"
              id="login-username"
              v-model="loginData.username"
              placeholder="Enter your username"
              required
            />
          </div>
          <div class="form-group">
            <label for="login-password">Password</label>
            <input
              type="password"
              id="login-password"
              v-model="loginData.password"
              placeholder="Enter your password"
              required
            />
          </div>
          <button type="submit" class="btn-primary">Log In</button>
        </form>

        <!-- 注册表单 -->
        <form v-else @submit.prevent="handleRegister">
          <h1>Log Up</h1>
          <p>Join us today! It takes only a few steps.</p>
          <div class="form-group">
            <label for="register-username">Username</label>
            <input
              type="text"
              id="register-username"
              v-model="registerData.username"
              placeholder="Enter your username"
              required
            />
          </div>
          <div class="form-group">
            <label for="register-password">Password</label>
            <input
              type="password"
              id="register-password"
              v-model="registerData.password"
              placeholder="Enter your password"
              required
            />
          </div>
          <div class="form-group">
            <label for="register-confirmPassword">Confirm Password</label>
            <input
              type="password"
              id="register-confirmPassword"
              v-model="registerData.confirmPassword"
              placeholder="Confirm your password"
              required
            />
          </div>
          <button type="submit" class="btn-primary">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      isLogin: true,
      loginData: {
        username: "",
        password: "",
      },
      registerData: {
        username: "",
        password: "",
        confirmPassword: "",
      },
    };
  },
  methods: {
    switchToLogin() {
      this.isLogin = true;
    },
    switchToRegister() {
      this.isLogin = false;
    },
    async handleLogin() {
      // const { username, password } = this.loginData;
      // console.log("Login Data:", { username, password });

      // try {
      //   // 构建 GET 请求 URL，带上 username 和 password 参数
      //   const response = await axios.get(
      //     "http://localhost:8080/index.php?r=api/login",
      //     {
      //       params: { username, password }, // GET 请求参数
      //       withCredentials: true, // 如果需要发送 Cookie
      //     }
      //   );

      //   // 请求成功后的逻辑
      //   if (response.data.status === 1) {
      //     //alert("Login Successful!");
      //     window.location.href = "/"; // 登录成功后跳转
      //   } else {
      //     alert(response.data.message || "Invalid username or password!");
      //   }
      // } catch (error) {
      //   console.error("Login Failed:", error.response ? error.response.data : error.message);
      //   alert("An error occurred during login. Please try again.");
      // }
      const { username, password } = this.loginData;
      console.log("Login Data:", { username, password });

      try {
        // 构建 GET 请求 URL，带上 username 和 password 参数
        const response = await axios.get(
          "http://localhost:8080/index.php?r=api/login",
          {
            params: { username, password }, // GET 请求参数
            withCredentials: true, // 如果需要发送 Cookie
          }
        );

        // 请求成功后的逻辑
        if (response.data.status === 1) {
          // 存储用户信息到 sessionStorage
          const userData = response.data.data; // 从响应中获取用户数据
          sessionStorage.setItem("userInfo", JSON.stringify(userData));

          alert("Login Successful!");
          window.location.href = "/"; // 登录成功后跳转
        } else {
          alert(response.data.message || "Invalid username or password!");
        }
      } catch (error) {
        console.error("Login Failed:", error.response ? error.response.data : error.message);
        alert("An error occurred during login. Please try again.");
      }
    },
    async handleRegister() {
      const { username, password, confirmPassword } = this.registerData;

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
      }

      // 添加密码复杂性校验（可选）
      const passwordRegex =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (!passwordRegex.test(password)) {
        alert(
          "Password must be at least 8 characters long and include uppercase, lowercase, number, and special character."
        );
        return;
      }

      try {
        const response = await axios.get(
      "http://localhost:8080/index.php?r=api/signup",
      {
        params: { username, password }, // 参数通过 GET 传递
        withCredentials: true,
      }
    );

        if (response.data.status === 1) {
          alert("Registration Successful!");
          this.switchToLogin(); // 注册成功后切换到登录界面
        } else {
          alert(response.data.message || "Registration failed!");
        }
      } catch (error) {
        console.error("Registration Failed:", error);
        alert("An error occurred during registration. Please try again.");
      }
    },
  },
};
</script>

<style>
/* 覆盖整个页面 */
.login-register-container {
  position: fixed; /* 固定位置，覆盖整个视口 */
  top: 0;
  left: 0;
  width: 100vw; /* 占满整个视口宽度 */
  height: 100vh; /* 占满整个视口高度 */
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to bottom right, #ffde59, #ff914d); /*背景渐变*/

  background-size: cover; /* 确保背景图覆盖整个页面 */
  background-position: center; /* 背景图居中 */
  background-repeat: no-repeat; /* 防止背景图重复 */
  z-index: 1000; /* 确保优先显示在最上层 */
}
/* 主内容盒子 */
.box {
  display: flex;
  background-color:rgba(255,255,255);
  border-radius: 15px;
  padding: 20px;
  width: 80%;
  max-width: 700px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* 左侧 Logo 区域 */
.logo-section {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.logo img {
  width: 350px; /* 设置宽度 */
  height: auto; /* 自动调整高度，保持图片比例 */
}


.logo h1 {
  font-size: 36px;
  font-family: "Press Start 2P", sans-serif;
  text-transform: uppercase;
  margin-top: 10px;
  color: #ff914d;
}

/* 右侧表单区域 */
.form-section {
  flex: 1;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

h1 {
  font-size: 28px;
  text-align: center;
  margin-bottom: 10px;
  color: #ff914d;
}

p {
  color: rgba(0, 0, 0);
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
}

/* 按钮样式 */
.btn-primary {
  background-color: #ff914d;
  color: white;
  border: 2px solid white;
  padding: 10px 15px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  width: 100%;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: white;
  color: #ff914d;
}

/* Tabs 样式 */
.tabs {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.tabs button {
  padding: 10px 20px;
  border: none;
  background-color:#ff914d;
  color: white;
  cursor: pointer;
  border-radius: 5px;
}

.tabs button.active {
  background-color: white;
  color: #ff914d;
}
</style>

