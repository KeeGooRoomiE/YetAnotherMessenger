<template>
  <div id="app">
    <h1>Anonymous Messenger</h1>
    <ChatComponent />
    <MessageListComponent />
  </div>
</template>

<script>

import ChatComponent from './components/ChatComponent.vue';
import MessageListComponent from './components/MessageListComponent.vue';

export default {
  components: {
    ChatComponent,
    MessageListComponent
  }
};
</script>

<style>
#app {
  max-width: 600px;
  margin: 0 auto;
}
</style>