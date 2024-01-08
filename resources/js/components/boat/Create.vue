<script setup>
import { ref } from 'vue'
import axios from 'axios'

const newBoat = ref({
    name: '',
    description: '',
    image_path: ''
})

const messageSuccess = ref('')
const messageError = ref('')

function createBoat() {
    axios.post('/api/boats/', {
        name: newBoat.value.name,
        description: newBoat.value.description,
        image_path: newBoat.value.image_path
      })
      .then(function (response) {
        console.log(response);
        messageSuccess.value = "Boat created successfully !"
        messageError.value = ""
      })
      .catch(function (error) {
        console.log(error);
        messageError.value = parseError(error)
        messageSuccess.value = ""
      });
}

function parseError(error) {
    let msg = ""
    if (error.response) {
        if (error.response.status === 422) {
            if (error.response.data.errors.name)
                msg += error.response.data.errors.name[0] + " "
            if (error.response.data.errors.description)
                msg += error.response.data.errors.description[0] + " "
            return msg
        }
        return error.response.data.message
    }
    return error.message
}

function goToBoats() {
    window.location.href = '/boats';
}

</script>


<template>
    <div>
        <div class="alert alert-success" v-show="messageSuccess !== ''">
            {{ messageSuccess }}
        </div>
        <div class="alert alert-danger" v-show="messageError !== ''">
            {{ messageError }}
        </div>
        <div class="">
            <button class="btn" @click="goToBoats()">Go back to boats</button>
        </div>
        <br>
        <div class="card">
            <div class="container">
                <h1>Create boat</h1>
                <div class="form">
                    <label for="">Name</label>
                    <input type="text" v-model="newBoat.name" />
                </div>
                <div class="form">
                    <label for="">Image path (URL)</label>
                    <input type="text" v-model="newBoat.image_path"  />
                </div>
                <div class="form">
                    <label for="">Description</label><br>
                    <textarea rows="5" cols="50" id="multiLineInput" v-model="newBoat.description"></textarea>
                </div>
                <div class="action">
                    <button class="btn" @click="createBoat()">Create</button>
                    <button class="btn" @click="goToBoats()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    @import '../../../css/app.css';
</style>