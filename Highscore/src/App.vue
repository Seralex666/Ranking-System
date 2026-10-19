<script setup></script>

<template>
  <RouterView />
</template>

<style>

body {
  background-color:blue;

}

.listelement {
  background-color: yellowgreen;
  border-radius: 4px;
  padding: 0.4em;
  list-style: none;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.buttons {
  color: blue;
  text-align: center;
  padding-bottom: 6px;
  display: flex;
  justify-content: center;
  gap: 12px;
}

.listing { 
  display: grid;
  gap: 3px;
  text-align: center;
  max-width: 400px;
  margin: 0 auto;
}

.topic {
  text-align: center;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  color: yellowgreen;
  text-shadow: 4px 4px 0 black;
}

.errormsges {
  color: white;
  background: #c0392b;
  padding: 8px 12px;
  border-radius: 6px;
  list-style: none;
}

.inputEntries {
  display: grid;
  max-width: 300px;
  margin: 0 auto;
  margin-bottom: 15px;
  gap: 3px;
}

</style>
