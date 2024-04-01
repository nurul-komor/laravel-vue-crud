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
                                <img />
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
            posts: []
        }
    },
    mounted() {
        axios.get(`${import.meta.env.VITE_SERVER_URI}/api/posts`)
            .then((res) => {
                this.posts = res.data
            })
            .catch((err) => {
                console.log(err);
            })
    }
}
</script>

<style scoped></style>