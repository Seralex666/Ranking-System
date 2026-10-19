<template>

<li class="listelement">
    <img :src="player.coaturl" alt="Wappen" width="40">
    {{ player.nickname }} - {{ player.city }} - {{ player.score }}
</li>

</template>


<script setup>

defineProps({
        player: Object
    })

</script>