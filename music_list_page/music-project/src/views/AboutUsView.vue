<template>
    <div class="about-us-container">
      <!-- 页头 -->
      <header class="about-header">
        <h1>关于我们</h1>
        <p>音乐世界，让音乐连接你我</p>
      </header>
  
      <!-- 简介部分 -->
      <section class="about-intro card">
        <h2>我们的使命</h2>
        <p>
          音乐世界致力于为全球音乐爱好者打造一个便捷、有趣、丰富的音乐分享和发现平台。
          我们希望让每一位用户都能在这里找到心仪的音乐，并通过音乐与他人建立连接。
        </p>
      </section>
  
      <!-- 团队部分 -->
      <section class="team-section">
        <h2>我们的团队</h2>
        <div class="image-row">
          <div
            class="image-card"
            v-for="(member, index) in teamMembers"
            :key="index"
            @click="showMemberDetails(member)"
          >
            <img :src="member.photo" alt="团队成员照片" />
            <h3>{{ member.name }}</h3>
            <p>{{ member.role }}</p>
          </div>
        </div>
      </section>
  
      <!-- 联系方式 -->
      <section class="contact-section card">
        <h2>联系我们</h2>
        <p>如果您有任何问题或建议，请随时联系我们：</p>
        <ul>
          <li>邮箱：contact@musicworld.com</li>
          <li>电话：+86-123-4567-8901</li>
          <li>地址：中国 · 北京市朝阳区音乐大厦10楼</li>
        </ul>
      </section>
       <!-- 模态框 -->
       <div v-if="selectedMember" class="modal-overlay" @click="closeModal">
      <div class="modal" @click.stop>
        <button class="close-button" @click="closeModal">×</button>
        <img :src="selectedMember.photo" alt="团队成员照片" />
        <h3>{{ selectedMember.name }}</h3>
        <p><strong>职位：</strong> {{ selectedMember.role }}</p>
        <p><strong>简介：</strong> {{ selectedMember.bio }}</p>
        <a
          :href="selectedMember.github"
          class="github-link"
          target="_blank"
          rel="noopener noreferrer"
        >
          访问 {{ selectedMember.name }} 的 GitHub
        </a>
      </div>
    </div>
      <!-- 底部 -->
      <footer class="about-footer">
        <p>版权所有 © 2024 音乐世界</p>
      </footer>
    </div>
  </template>
  
  
  
  <script>
  export default {
    name: "AboutUsView",
    data() {
      return {
        teamMembers: [
          {
            name: "木棉",
            role: "创始人 & CEO",
            bio: "木棉是音乐世界的创始人，热爱音乐和技术，致力于打造全球顶尖的音乐平台。",
            photo: "/music-project/assets/images/team/ceo.jpg",
            github: "https://pornhub.com"
          },
          {
            name: "红危机",
            role: "首席技术官",
            bio: "红危机专注于音乐推荐算法和用户体验优化，是技术团队的核心力量。",
            photo: "/music-project/assets/images/team/cto.jpg",
            github: "https://pornhub.com"
          },
          {
            name: "deps",
            role: "设计总监",
            bio: "deps在用户界面设计和交互设计方面拥有多年经验，让音乐世界充满视觉美感。",
            photo: "/music-project/assets/images/team/designer.jpg",
            github: "https://pornhub.com"
          }
        ],
        selectedMember: null // 当前选中的团队成员信息
      };
    },
    methods: {
    // 显示团队成员详情
    showMemberDetails(member) {
      console.log("点击的团队成员信息：", member);
      this.selectedMember = member;
    },
    // 关闭模态框
    closeModal() {
      this.selectedMember = null;
    }
  }
  };
  </script>
  <style scoped>
  /* 页面容器样式 */
  .about-us-container {
    font-family: Arial, sans-serif;
    padding: 40px 20px;
    color: #333;
    text-align: center;
    background: linear-gradient(to bottom, #f99c07, #ffd19c);
  }
  
  /* 页头样式 */
  .about-header {
    margin-bottom: 40px;
  }
  
  .about-header h1 {
    font-size: 2.5em;
    margin: 0;
    color: #fff;
  }
  
  .about-header p {
    font-size: 1.2em;
    color: #ffe7cc;
    margin-top: 10px;
  }
  
  /* 卡片样式 */
  .card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }
  
  /* 团队部分 */
  .team-section h2 {
    font-size: 1.8em;
    margin-bottom: 20px;
    color: #fff;
  }
  
  .image-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin: 20px auto;
  }
  
  .image-card {
    width: 220px;
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .image-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
  }
  
  .image-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
  }
  
  .image-card h3 {
    font-size: 1.2em;
    margin: 10px 0 5px;
    color: #f99c07;
  }
  
  .image-card p {
    font-size: 1em;
    color: #666;
  }
  
  /* 模态框样式 */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .modal {
  background: #fff;
  border-radius: 15px;
  padding: 30px;
  width: 600px;
  height: 600px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  text-align: left; /* 左对齐文本内容 */
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.modal img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 20px;
}

.modal-header {
  display: flex;
  align-items: center;
  gap: 20px; /* 图片和文字之间的间距 */
}

.modal-content {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.modal-content h3 {
  font-size: 1.5em;
  color: #333;
  margin: 0;
}

.modal-content p {
  font-size: 1.1em;
  color: #666;
  margin: 0;
  line-height: 1.6; /* 增加行高 */
}

.modal-content .github-link {
  margin-top: 15px;
  font-size: 1.1em;
  color: #f99c07;
  text-decoration: none;
  padding: 10px 20px;
  border: 1px solid #f99c07;
  border-radius: 5px;
  transition: background-color 0.3s ease, color 0.3s ease;
  display: inline-block; /* 使按钮居左显示 */
}

.modal-content .github-link:hover {
  background-color: #f99c07;
  color: #fff;
}

.close-button {
  position: absolute;
  top: 15px;
  right: 15px;
  background: transparent;
  border: none;
  font-size: 1.5em;
  color: #333;
  cursor: pointer;
  transition: color 0.3s ease;
}

.close-button:hover {
  color: #ff0000;
}

  
  /* 页脚样式 */
  .about-footer {
    text-align: center;
    padding: 10px;
    background-color: white;
    color: #333;
    margin-top: 40px;
  }
  /* 联系方式部分样式 */
.contact-section {
  text-align: center; /* 文本居中对齐 */
  background: #fff; /* 白色背景 */
  border-radius: 15px; /* 卡片圆角 */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* 添加阴影效果 */
  padding: 20px; /* 内部内容间距 */
  margin: 20px auto; /* 居中显示并添加上下外间距 */
  max-width: 800px; /* 设置最大宽度，限制卡片宽度 */
}

.contact-section h2 {
  font-size: 1.8em; /* 标题字体大小 */
  color: #f99c07; /* 标题颜色 */
  margin-bottom: 15px; /* 标题下方的间距 */
}

.contact-section p {
  font-size: 1.1em; /* 段落字体大小 */
  color: #555; /* 段落文字颜色 */
  margin-bottom: 15px; /* 段落与列表之间的间距 */
}

.contact-section ul {
  list-style: none; /* 去掉默认列表样式 */
  padding: 0; /* 去掉内边距 */
  margin: 0; /* 去掉外边距 */
}

.contact-section ul li {
  font-size: 1.1em; /* 列表项字体大小 */
  color: #666; /* 列表项颜色 */
  margin-bottom: 10px; /* 列表项之间的间距 */
}

/* 列表项图标（如果需要，可以加上前缀图标） */
.contact-section ul li:before {
  content: '•'; /* 使用小圆点作为图标 */
  color: #2f80ed; /* 图标颜色 */
  font-weight: bold;
  display: inline-block;
  width: 1em; /* 图标宽度 */
  margin-right: 10px; /* 图标与文字之间的间距 */
}
.github-link {
  display: inline-block;
  margin-top: 15px;
  font-size: 1.1em;
  color: #f99c07;
  text-decoration: none;
  padding: 10px 20px;
  border: 1px solid #f99c07;
  border-radius: 5px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.github-link:hover {
  background-color:  #f99c07;
  color: #fff;
}
  </style>
  