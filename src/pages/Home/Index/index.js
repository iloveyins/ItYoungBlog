import Vue from 'vue'
import App from './app'
import VueRouter from 'vue-router'
import Home from '../../../components/Home'//
import Limit from '../../../components/Limit'//
import Livelearn from '../../../components/Livelearn'//
import PlaceFile from '../../../components/PlaceFile'//
import Speak from '../../../components/Speak'//
import About from '../../../components/About'//

Vue.use(VueRouter)

const routes = [
  {
     path: '/',
     component: Home
   },
  { path: '/Home', component: Home },
  { path: '/Limit', component: Limit },
  { path: '/Livelearn', component: Livelearn },
  { path: '/PlaceFile', component: PlaceFile },
  { path: '/Speak', component: Speak },
  { path:'/About', component: About}
]

const router = new VueRouter({
  routes // （缩写）相当于 routes: routes
})

new Vue({
  router,
  components: { App }
}).$mount('app')
