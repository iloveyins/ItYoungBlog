import Vue from 'vue'
import App from './app'
import VueRouter from 'vue-router'
import ControlPanel from '../../../components/Admin/ControlPanel'
import ArticleManager from '../../../components/Admin/ArticleManager'
import ArticleRecycling from '../../../components/Admin/ArticleRecycling'

Vue.use(VueRouter)

const routes = [
  {
     path: '/',
      name: 'ControlPanel',
     component: ControlPanel
  },
  { path: '/ControlPanel', component: ControlPanel },
  { path: '/ArticleManager', component: ArticleManager },
  { path: '/ArticleRecycling', component: ArticleRecycling },
]

const router = new VueRouter({
  routes // （缩写）相当于 routes: routes
});

/* eslint-disable no-new */
new Vue({
  router,
  components: { App }
}).$mount('app');
