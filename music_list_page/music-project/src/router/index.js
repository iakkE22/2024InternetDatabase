import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL || '/'), // 修改为 Vue CLI 的方式
  routes: [
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginRegister.vue'),
      meta: {
        showNavBar: false
      }
    },
    {
      path: '/',
      name: 'home',
      component: () => import('../views/homepage.vue'),
      meta: {
        showNavBar: true
      }
    },
  ]
})

// router.beforeEach((to, from, next) => {
//   const Username = sessionStorage.getItem('Username')
//   const Password = sessionStorage.getItem('Password')

//   // 检查 Session Storage 中的值
//   if (!Username && !Password && to.path !== '/login') {
//     next('/login')
//   } else {
//     next()
//   }
// })

export default router
