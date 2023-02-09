import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import contatos from '../views/contatos.vue'
import cadastro from '../views/cadastro.vue'
import mid from '../services/middleware'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
{
  path:'/contatos',
  name:'contatos',
  component:contatos,
  beforeEnter:mid.auth
},
{
  path:'/cadastro',
  name:'cadastro',
  component:cadastro
}
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
