<template>
    <div class="user-profile-container">
      <!-- 头部 -->
      <header class="profile-header">
        <h1>个人信息</h1>
        <p>管理您的账户信息</p>
      </header>
  
      <!-- 用户信息卡片 -->
      <section class="profile-card">
        <img :src="user.avatar" alt="用户头像" class="user-avatar" />
        <h2>{{ user.name }}</h2>
        <p class="user-email">邮箱：{{ user.email }}</p>
        <p class="user-joined">注册时间：{{ user.joined }}</p>
        <button class="edit-button" @click="toggleEditForm">
          {{ showEditForm ? "关闭编辑" : "编辑个人信息" }}
        </button>
      </section>
  
      <!-- 信息编辑部分（通过 showEditForm 控制显示） -->
      <section v-if="showEditForm" class="profile-edit">
        <h2>编辑个人信息</h2>
        <form @submit.prevent="updateProfile">
          <div class="form-group">
            <label for="name">姓名：</label>
            <input
              id="name"
              type="text"
              v-model="editForm.name"
              placeholder="请输入您的姓名"
            />
          </div>
          <div class="form-group">
            <label for="email">邮箱：</label>
            <input
              id="email"
              type="email"
              v-model="editForm.email"
              placeholder="请输入您的邮箱"
            />
          </div>
          <div class="form-group">
            <label for="avatar">头像链接：</label>
            <input
              id="avatar"
              type="text"
              v-model="editForm.avatar"
              placeholder="请输入头像图片链接"
            />
          </div>
          <button type="submit" class="save-button">保存更改</button>
        </form>
      </section>
    </div>
  </template>
  
  <script>
  export default {
    name: "UserProfile",
    data() {
      return {
        // 用户当前信息
        user: {
          name: "张三",
          email: "zhangsan@example.com",
          avatar: "https://via.placeholder.com/150",
          joined: "2024-01-01"
        },
        // 用于编辑的表单数据
        editForm: {
          name: "",
          email: "",
          avatar: ""
        },
        // 控制编辑表单的显示
        showEditForm: false
      };
    },
    methods: {
      // 切换编辑表单的显示状态
      toggleEditForm() {
        this.showEditForm = !this.showEditForm;
        if (this.showEditForm) {
          // 初始化编辑表单
          this.editForm = { ...this.user };
        }
      },
      // 更新用户信息
      updateProfile() {
        // 简单验证
        if (!this.editForm.name || !this.editForm.email || !this.editForm.avatar) {
          alert("请完整填写所有信息！");
          return;
        }
  
        // 更新用户信息
        this.user = { ...this.editForm };
  
        // 关闭编辑表单
        this.showEditForm = false;
  
        alert("个人信息更新成功！");
      }
    }
  };
  </script>
  
  <style scoped>
  /* 页面容器 */
  .user-profile-container {
    font-family: Arial, sans-serif;
    padding: 20px;
    color: #333;
    background: linear-gradient(to bottom, #56ccf2, #2f80ed);
    min-height: 100vh;
    text-align: center;
    width: 600px;
  }
  
  /* 页头样式 */
  .profile-header {
    margin-bottom: 30px;
  }
  
  .profile-header h1 {
    font-size: 2.5em;
    color: #fff;
  }
  
  .profile-header p {
    font-size: 1.2em;
    color: #e0e0e0;
  }
  
  /* 用户信息卡片 */
  .profile-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px auto;
    max-width: 600px; /* 卡片宽度更宽 */
    text-align: center;
  }
  
  .user-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
  }
  
  .profile-card h2 {
    font-size: 1.8em;
    color: #333;
    margin: 10px 0;
  }
  
  .user-email,
  .user-joined {
    font-size: 1.1em;
    color: #555;
    margin: 5px 0;
  }
  
  .edit-button {
    display: inline-block;
    background: #2f80ed;
    color: #fff;
    font-size: 1em;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
    transition: background 0.3s ease;
  }
  
  .edit-button:hover {
    background: #2569c2;
  }
  
  /* 编辑信息部分 */
  .profile-edit {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px auto;
    max-width: 600px; /* 编辑部分宽度更宽 */
  }
  
  .profile-edit h2 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 15px;
    text-align: left;
  }
  
  .form-group label {
    font-size: 1.1em;
    color: #333;
    display: block;
    margin-bottom: 5px;
  }
  
  .form-group input {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  
  .save-button {
    display: inline-block;
    background: #2f80ed;
    color: #fff;
    font-size: 1em;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  
  .save-button:hover {
    background: #2569c2;
  }
  </style>
  