import RankingView from '@/views/RankingView.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', name: 'ranking', component: RankingView }
  ],
})

export default router
