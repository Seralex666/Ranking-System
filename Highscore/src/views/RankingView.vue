<template>
    <h1 class="topic">Ranking System</h1>

    <ul class="errormsges" v-if="Object.keys(errors).length">
        <li v-for="(messages, field) in errors" :key="field">
            {{ field }} :  {{ messages[0] }}
        </li>
    </ul>

    <form class="inputEntries" @submit.prevent="addPlayer">
        <input v-model="newPlayer.nickname" type="text" placeholder="Nickname">
        <input v-model="newPlayer.city" type="text" placeholder="Cities">
        <input v-model.number="newPlayer.score" type="number" placeholder="Points">
        <input v-model="newPlayer.coaturl" type="text" placeholder="Coat URL">
        <button type="submit">Add</button>
    </form>



    <div class="buttons">
        <button  @click="sortedBy('nickname')">Nicknames
            <span v-if="sField === 'nickname'"> {{ sAsc ? '▲' : '▼' }}</span>
        </button>
        <button  @click="sortedBy('city')">Cities
            <span v-if="sField === 'city'"> {{ sAsc ? '▲' : '▼' }}</span>
        </button>
        <button  @click="sortedBy('score')">Points
            <span v-if="sField === 'score'"> {{ sAsc ? '▲' : '▼' }}</span>
        </button>
    </div>
    
    <ul class="listing">
        <PlayerRows v-for="player in sortPlayer" :key="player.id" :player />
    </ul>
</template>

<script setup>
    import { ref, onMounted, computed } from 'vue'
    import PlayerRows from '@/components/PlayerRows.vue'

    const errors = ref({})
    const newPlayer = ref ({ nickname: '', city: '', score: 0, coaturl: ''})
    const players = ref([])
    const sField = ref('score')
    const sAsc = ref(true)
    async function getPlayers() {
        const setPlayer = await fetch('http://127.0.0.1:8000/api/players')
        const data = await setPlayer.json()
        players.value = data
    }
    onMounted(() => {
        getPlayers()
    })

    const sortPlayer = computed(() => {
        const ascdesc = sAsc.value ? 1 : -1
        return [...players.value].sort((a,b) => {
            if (sField.value === 'score') {
                return (a[sField.value] - b[sField.value]) * ascdesc
            }
            return a[sField.value].localeCompare(b[sField.value]) * ascdesc
        })
    })

    function sortedBy(field) {
        if (sField.value === field) {
            sAsc.value = !sAsc.value
        } else {
            sField.value = field
            sAsc.value = true
        }
    }

    async function addPlayer() {
        const answer = await fetch('http://127.0.0.1:8001/api/players', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(newPlayer.value),
        })
        if (answer.ok) {
            await getPlayers()
            newPlayer.value = { nickname: '', city: '', score: 0, coaturl: '' }
            errors.value = {}
        } else {
            const problem = await answer.json()
            errors.value = problem.errors

            }
        }
    


    
</script>