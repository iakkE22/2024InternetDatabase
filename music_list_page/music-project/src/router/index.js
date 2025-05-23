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
    {
        path: '/aboutus',
        name: 'aboutus',
        component: () => import('../views/AboutUsView.vue'),
        meta: {
          showNavBar: true
        }
      },
    {
        path: '/user',
        name: 'userpage',
        component: () => import('../views/UserPageView.vue'),
        meta: {
          showNavBar: true
        }
      },
    {
      path: '/playlist',
      name: 'songlist',
      component: () => import('../views/songListView.vue'),
      meta: {
        showNavBar: true
      }
    },
    {
      path: "/video",
      name: "videoList",
      component: () => import("../views/VideoListView.vue"),
      meta: {
        showNavBar: true
      }
    },
    {
      path: "/mv",
      name: "videoDetail",
      component: () => import("../views/VideoDetailView.vue"),
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
