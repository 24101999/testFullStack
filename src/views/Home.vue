<template>
  <div class="login">
    <div class="form-login">
      <h1>Login</h1>
      <form @submit.prevent="post()">
        <input type="email" placeholder="email" name="email" v-model="email" />
        <input
          type="password"
          placeholder="senha"
          name="password"
          v-model="password"
        />
        <button type="submit">Entrar</button>
        <h2 @click="cadastro()">cadastre-se</h2>
      </form>
    </div>
  </div>
</template>

<script>
// import axios from "axios";
import Cookie from "js-cookie";
export default {
  name: "Home",
  data() {
    return {
      email: "",
      password: "",
    };
  },

  // created() {
  //   Cookie.remove("token");
  // },
  methods: {
    cadastro() {
      this.$router.push("/cadastro");
    },

    post() {
      this.$router.push("/contatos");
      if (this.email == "") {
        this.active = "active";
      } else {
        this.active = "";
      }
      const payload = {
        email: this.email,
        password: this.password,
      };

      fetch(`http://127.0.0.1:8000/api/log`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Access: "application/json",
        },
        body: JSON.stringify(payload),
      })
        .then((response) => response.json())
        .then((res) => {
          Cookie.set("token", res.access_token);
          console.log(res);
        });

      // axios
      //   .post("http://127.0.0.1:8000/api/log", {
      //     email: this.email,
      //     senha: this.senha,
      //     headers: {
      //       "Content-Type": "application/json",
      //       Access: "application/json",
      //     },
      //     body: JSON.stringify(payload),
      //   })
      //   .then((res) => res.json())
      //   .then((re) => {
      //     console.log(re);
      //   });
    },
    contatos() {
      this.$router.push("/contatos");
    },
  },
};
</script>

<style scoped src="./Home CSS/home.css"></style>
