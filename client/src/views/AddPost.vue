<script setup>
import axios from 'axios';
import Title from './components/Title.vue';

</script>
<template>
    <div>
        <Title>
            Add Post
        </Title>
        <form @submit="submit" enctype="multipart/form-data">
            <div class="p-5">
                <div>
                    <label>Title</label>
                    <br>
                    <input type="text" v-model="input.title" class="p-1 px-2">
                </div>
                <div>
                    <label>Image</label>
                    <br>
                    <input type="file" name="image" ref="fileInput" class="p-1 px-2 file">
                </div>
                <br>
                <div>
                    <label>Description</label>
                    <br>
                    <input type="text" v-model="input.description" class="p-1 px-2">
                </div>
                <br>
                <button type="submit" class="bg-blue-400 px-2 py-1 rounded cursor-pointer">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            input: {
                title: '',
                description: '',
            }
        }
    },
    methods: {
        submit(e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('title', this.input.title);
            formData.append('description', this.input.description);
            formData.append('image', this.$refs.fileInput.files[0]);
            axios.post(`${import.meta.env.VITE_SERVER_URI}/api/post/store`, formData, {
                headers: {
                    "Accept": "application/json"
                }
            })
                .then(response => {
                    alert(response.data)
                    // this.resetForm()
                    // this.$router.push('/')
                })
                .catch(error => {
                    console.log(error);
                })
        },
        resetForm() {
            this.input.title = '';
            this.input.description = '';
        }
    }
}
</script>


<style lang="scss" scoped></style>