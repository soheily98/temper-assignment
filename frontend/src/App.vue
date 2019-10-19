<template>
  <div id="app">
    <Panel/>
  </div>
</template>

<script>
import Panel from "./components/Panel";

export default {
  name: 'app',
  components: {
    Panel
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 20px;
}
</style>
