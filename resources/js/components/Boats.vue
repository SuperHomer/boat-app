<script setup>
import { ref } from 'vue'
import axios from 'axios'

const boats = ref([])

axios.get('/api/boats').then(response => {
    boats.value = response.data
})
</script>

<template>
  <div class="container">
    <h1>Boats</h1>
    <div class="card-zone">
        <a class="card-link" :href="'/boats/'+boat.id"  v-for="boat in boats" :key="boat.id">
            <div class="card">
                <img class="card-img" :src="boat.image_path" :alt="boat.name" />
                <div class="card-content">
                    <div class="card-title">{{ boat.name }}</div>
                    <div class="card-text">{{ boat.description }}</div>
                </div>
            </div>
        </a>
    </div>
  </div>
</template>

<style scoped>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-left: 10%;
        padding-right: 10%;
    }
    .card-zone {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }   
    .card-link {
        text-decoration: none;
    }
    .card-link:hover {
        transform: scale(1.05);
        transition: 300ms;
    }
    .card {
        width: 200px;
        height: 270px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3);
        border-radius: 20px;
    }
    .card-img {
        padding: 10px;
        width: calc(100% - 20px);
        border-radius: 20px;
    }
    .card-content {
        padding-left: 10px;
        padding-right: 10px;
    }
    .card-title {
        font-weight: 600;
        margin-top: 5px;
        font-size: 0.9rem;
        color: black;
    }
    .card-text {
        font-size: 0.8rem;
        color: rgb(121, 120, 120);
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* number of lines to show */
                line-clamp: 3; 
        -webkit-box-orient: vertical;
    }
</style>