<template>
  <div>
    <!-- Существующая форма для отправки сообщений -->
    <input
        v-model="receiverPseudonym"
        placeholder="Receiver's pseudonym"
    />
    <input
        v-model="senderPseudonym"
        placeholder="Sender's pseudonym"
    />
    <textarea
        v-model="message"
        placeholder="Type your message (max 500 characters)"
        maxlength="500"
    ></textarea>
    <input type="file" @change="handleFileUpload" />
    <select v-model="expirationTime">
      <option v-for="option in expirationOptions" :key="option.value" :value="option.value">
        {{ option.label }}
      </option>
    </select>
    <button @click="sendMessage">Send</button>
    <p v-if="messageSent">Message sent!</p>

    <!-- Новая кнопка Increment -->
    <button @click="incrementCurNum">Increment: {{ curNum }}</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      receiverPseudonym: '',
      senderPseudonym: '',
      message: '',
      file: null,
      expirationTime: 1,
      messageSent: false,
      curNum: 0,  // Добавлено для хранения значения curNum
      expirationOptions: [
        {value: 1, label: '1 minute'},
        {value: 5, label: '5 minutes'},
        {value: 15, label: '15 minutes'},
        {value: 60, label: '1 hour'}
      ]
    };
  },
  methods: {
    // Метод для загрузки файла
    handleFileUpload(event) {
      
      this.file = event.target.files[0];
    },

    inject: ['$axios'],

    // Метод для отправки сообщений
    async sendMessage() {
      const formData = new FormData();
      formData.append('sender_pseudonym', this.senderPseudonym);
      formData.append('receiver_pseudonym', this.receiverPseudonym);
      formData.append('content', this.message);
      formData.append('expiration_time', this.expirationTime);
      if (this.file) {
        formData.append('file', this.file);
      }

      try {
        await this.$axios.post('/api/messages', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });
        this.messageSent = true;
        this.message = '';
        this.file = null;
      } catch (error) {
        console.error('Error sending message:', error);
      }
    },

    // Метод для получения текущего значения curNum
    async fetchCurNum() {
      try {
        const response = await this.$axios.get('/api/number');
        this.curNum = response.data.curNum; 
      } catch (error) {
        console.error('Error fetching curNum:', error);
      }
    },

    async incrementCurNum() {
      try {
        const response = await this.$axios.post('/number/increment');
        this.curNum = response.data.curNum;
      } catch (error) {
        console.error('Error incrementing curNum:', error);
      }
    }
  },

  // Когда компонент монтируется, мы загружаем текущее значение curNum
  mounted() {
    this.fetchCurNum();
  }
};
</script>

<style>
/* Стили для кнопок */
button {
  margin-top: 10px;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
}
</style>