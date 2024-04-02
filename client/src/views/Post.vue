<script setup>
import Title from './components/Title.vue';
import axios from 'axios';
</script>

<template>
    <div>
        <Title>
            All Post
        </Title>
        <div class="p-3 max-w-[1300px]">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                            v-for="(post, index) in posts" :key="index">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ post?.title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ post?.description }}
                            </td>
                            <td class="px-6 py-4">
                                <img :src="serverUri + '/' + post?.image" :alt="post?.image" style="height:200px" />
                            </td>
                            <td class="px-6 py-4 space-x-4">

                                <router-link :to="`/edit-post/` + post?.id"
                                    class="underline text-blue-400 cursor-pointer">Edit
                                    Post</router-link>
                                <button @click="deletePost(post?.id)"
                                    class="underline text-red-400 cursor-pointer">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            serverUri: import.meta.env.VITE_SERVER_URI
        }
    },
    mounted() {
        this.fetchPost()
    },
    methods: {
        fetchPost() {
            axios.get(`${import.meta.env.VITE_SERVER_URI}/api/posts`)
                .then((res) => {
                    this.posts = res.data
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        deletePost(index) {
            axios.delete(`${import.meta.env.VITE_SERVER_URI}/api/post/delete/${index}`).then((res) => {
                this.fetchPost()
                alert('post deleted successfully')
            })
        }
    }
}
</script>

<style scoped></style>