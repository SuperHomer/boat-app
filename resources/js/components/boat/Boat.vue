<script setup>
import { ref, watch } from 'vue'
import axios from 'axios'

const props = defineProps({'boat': Object})
// const model = defineModel({'newBoat': Object})

// model.newBoat = props.boat

const mode = ref(1)
const message = ref('')

const test = ref('')

watch(mode, () => {
  if (mode.value !== 1 && mode.value !== 4) {
    message.value = ""
  }
})

const newBoat = ref({
    name: props.boat.name,
    description: props.boat.description,
    image_path: props.boat.image_path
})


function editBoat() {
    console.log(newBoat.value)
    axios.put('/api/boats/' + props.boat.id, {
        name: newBoat.value.name,
        description: newBoat.value.description,
        image_path: newBoat.value.image_path
      })
      .then(function (response) {
        console.log(response);
        message.value = "Boat edited successfully !"
        mode.value = 1
      })
      .catch(function (error) {
        alert(error);
      });
}

function deleteBoat() {
    axios.delete('/api/boats/' + props.boat.id)
      .then(function (response) {
        console.log(response);
        message.value = "Boat deleted successfully !"
        mode.value = 4
        // router.push({ name: 'Boats' })
      })
      .catch(function (error) {
        alert(error);
      });
}

</script>

<template>
    <div>
        <div class="container" v-show="message !== ''">
            {{ message }}
        </div>
        <div class="container" v-show="mode == 1">
            <h1>{{ newBoat.name }}</h1>
            <img class="boat-img" :src="newBoat.image_path" :alt="newBoat.name" />
            <p>{{ newBoat.description }}</p>
            <div class="action">
                <button class="btn" @click="mode=2">Edit</button>
                <button class="btn" @click="mode=3">Delete</button>
            </div>
        </div>
        <div class="container"  v-show="mode == 2">
            <h1>Edit</h1>
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
                <button class="btn" @click="editBoat()">Save</button>
                <button class="btn" @click="mode=1">Cancel</button>
            </div>
        </div>
        <div class="container" v-show="mode == 3">
            <h1>Delete</h1>
            <h3>Are you sure you want to delete this item ?</h3>
            <div class="action">
                <button class="btn" @click="deleteBoat()">Yes</button>
                <button class="btn" @click="mode=1">No</button>
            </div>
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
    .action {
        padding: 10px;
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
    .boat-img {
        padding: 10px;
        width: 50%;
        border-radius: 20px;
    }
    input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: solid 1px black;
        margin-bottom: 10px;
    }
    textarea {
        font-family: inherit;
        font-size: inherit;
    }
    .form {
        width: 100%;
        margin-bottom: 10px;
        max-width: 500px;
    }
</style>
