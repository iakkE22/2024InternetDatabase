<template>
  <div class="login-register-container">
    <div class="box">
      <div class="illustration-section">
        <img src="https://via.placeholder.com/400x400" alt="Illustration" />
      </div>

      <div class="form-section">
        <div class="tabs">
          <button :class="{ active: isLogin }" @click="switchToLogin">Log In</button>
          <button :class="{ active: !isLogin }" @click="switchToRegister">Sign Up</button>
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
          <h1>Sign Up</h1>
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

<style scoped>
/* 样式与原代码一致，无需改动 */
.login-register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #eef2f3;
}
.box {
  display: flex;
  background: #ffffff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  width: 80%;
  max-width: 900px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  gap: 20px;
}
.illustration-section {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f4f8fb;
  border-radius: 8px;
}
.illustration-section img {
  width: 100%;
  max-width: 300px;
  height: auto;
}
.form-section {
  flex: 1;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
h1 {
  font-size: 24px;
  margin-bottom: 10px;
}
p {
  color: #555;
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
}
.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 14px;
}
.btn-primary {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  width: 100%;
}
.btn-primary:hover {
  background-color: #0056b3;
}
.tabs {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}
.tabs button {
  padding: 10px 20px;
  border: none;
  background-color: #ddd;
  cursor: pointer;
  border-radius: 5px;
}
.tabs button.active {
  background-color: #007bff;
  color: white;
}
</style>
