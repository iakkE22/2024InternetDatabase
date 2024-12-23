{
    path: "/video",
    name: "videoList",
    component: () => import("../views/VideoListView.vue"),
  },
  {
    path: "/video/:id",
    name: "videoDetail",
    component: () => import("../views/VideoDetailView.vue"),
  },