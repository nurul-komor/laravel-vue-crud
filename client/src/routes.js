import { createMemoryHistory, createRouter, createWebHistory } from 'vue-router'
import Post from './views/Post.vue';
import AddPost from './views/AddPost.vue';
import EditPost from './views/EditPost.vue';


const routes = [
    { path: '/', component: Post },
    { path: '/add-post', component: AddPost },
    { path: '/edit-post/:id', component: EditPost },
]

const router = createRouter({
    // history: createMemoryHistory(),
    history: createWebHistory(),
    routes,
})

export default router;