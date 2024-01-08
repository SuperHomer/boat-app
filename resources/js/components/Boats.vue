<script setup>
import { ref } from 'vue'
import axios from 'axios'

const boats = ref([])

axios.get('/api/boats').then(response => {
    boats.value = response.data
})


function goToCreateBoat() {
    window.location.href = '/boats/create';
}

</script>

<template>
  <div class="">
    <div class="header">
        <h1>Boats list</h1>
        <button class="btn" @click="goToCreateBoat()">Create boat +</button>
    </div>
    <br>
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
        border: none;
    }
    .card-img {
        padding: 10px;
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
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        border: solid 1px black;
        border-radius: 5px;
        background-color: rgba(0, 0, 0);
        color: white;
        text-decoration: none;
        margin-right: 5px;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>