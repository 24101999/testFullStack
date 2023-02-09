<template>
  <div class="cadastro">
    <div class="form-cadastro">
      <form @submit.prevent="post()">
        <h1>Cadastro</h1>
        <input
          type="text"
          name="name"
          placeholder="nome"
          v-model="dados.name"
        />
        <input
          type="email"
          name="email"
          placeholder="email"
          v-model="dados.email"
        />
        <input
          type="text"
          name="password"
          placeholder="senha"
          v-model="dados.password"
        />
        <button type="submit">Cadastrar</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "cadastro",
  data() {
    return {
      dados: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    post() {
      axios.post("http://127.0.0.1:8000/userlogin", {
        name: this.dados.name,
        email: this.dados.email,
        password: this.dados.password,
      });
      this.$router.push("/");
    },
  },
};
</script>

<style scoped src="./cadastro CSS/cadastro.css"></style>
