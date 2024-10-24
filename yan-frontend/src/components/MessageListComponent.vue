<template>
  <div>
    <h2>Your Messages</h2>
    <div v-for="message in messages" :key="message.id" class="message">
      <p><strong>From:</strong> {{ message.sender_pseudonym }}</p>
      <p><strong>Message:</strong> {{ message.content }}</p>
      <p><strong>Status:</strong> {{ message.read_status ? 'Read' : 'Unread' }}</p>
      <p><strong>Time:</strong> {{ formatDate(message.created_at) }}</p>
    </div>
    <button @click="loadMore">Load More</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],  // Все загруженные сообщения
      currentPage: 1,  // Текущая страница
      pageSize: 10  // Количество сообщений на страницу
    };
  },
  methods: {
    async fetchMessages() {
      try {
        const response = await this.$axios.get(`/messages/yourPseudonym?page=${this.currentPage}&pageSize=${this.pageSize}`);
        this.messages = [...this.messages, ...response.data.data];
      } catch (error) {
        console.error('Error fetching messages:', error);
      }
    },
    loadMore() {
      //this.currentPage++;
      this.fetchMessages();
    },
    formatDate(date) {
      return new Date(date).toLocaleString();
    }
  },
  mounted() {
    this.fetchMessages();  
  }
};
</script>

<style>
.message {
  border: 1px solid #ccc;
  margin: 10px 0;
  padding: 10px;
}
</style>