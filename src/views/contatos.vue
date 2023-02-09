<template>
  <div class="">
    <div class="modal" :class="close">
      <div class="form-modal">
        <h1>Contatos</h1>
        <h1 class="closed" @click="modal()">X</h1>
        <form>
          <input
            type="file"
            name="img"
            @change="newfile"
            :v-model="dados.img"
          />
          <input
            type="text"
            placeholder="nome"
            :name="dados.nome"
            v-model="dados.nome"
          />
          <input
            type="email"
            placeholder="email"
            :name="dados.email"
            v-model="dados.email"
          />
          <input
            type="text"
            placeholder="telefone"
            :name="dados.telefone"
            v-model="dados.telefone"
          />
          <input type="date" :name="dados.date" v-model="dados.date" />
          <div class="" v-if="insert_update === 'post'">
            <button type="submit" @click.prevent="post()">Enviar</button>
          </div>
          <div class="" v-else-if="insert_update === 'update'">
            <button type="submit" @click.prevent="update($e)">editar</button>
          </div>
          <div class="" v-else>''</div>
        </form>
      </div>
    </div>
    <div class="contatos">
      <div class="add-contato">
        <button @click="open()">adicinar contato</button>
        <button>
          <a href="http://127.0.0.1:8000/pdf" target="_blank">Relatorio</a>
        </button>
      </div>
      <div class="elements" v-for="d in dado" :key="d">
        <div class="info-elemts">
          <img src="../" alt="" />
          <p><strong>Nome</strong>: {{ d.nome }}</p>
          <p><strong>Email</strong>: {{ d.email }}</p>
          <p><strong>Telefone</strong>: {{ d.telefone }}</p>
        </div>
        <div class="buttons">
          <button @click="editar(($e = d.id))">Edit</button>
          <button @click="deletar(($e = d.id))">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "contatos",
  data() {
    return {
      file: "",
      name: "",
      dados: {
        img: "",
        nome: "",
        email: "",
        telefone: "",
        date: "",
      },
      dado: "",
      close: "",
      insert_update: "",
      place: {
        nome: "",
        email: "",
        telefone: "",
      },
    };
  },
  methods: {
    newfile(event) {
      console.log(event);
      this.file = event.target.files[0];
    },
    modal() {
      this.close = "close";
    },
    open() {
      this.close = "open";
      this.insert_update = "post";
    },

    editar() {
      this.close = "open";
      this.insert_update = "update";
    },
    get() {
      axios.get("http://127.0.0.1:8000/").then((res) => {
        this.dado = res.data;
      });
    },
    post() {
      //upload
      let form = "";
      form = new FormData();
      form.append("img", this.file);
      form.append("name", this.file.name);
      // form.append("imagen", this.file);
      // form.append("name", this.file.name);
      axios
        .post("http://127.0.0.1:8000/upload", form, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          console.log(res);
        });
      //upload
      axios.post("http://127.0.0.1:8000/insert", this.dados);
      setTimeout(() => {
        this.dados.nome = "";
        this.dados.email = "";
        this.dados.telefone = "";
        this.dados.date = "";
        this.dado.img = "";
        // this.dados.img = "";
        this.close = "close";
        this.get();
      }, 400);
    },
    deletar(e) {
      axios.delete(`http://127.0.0.1:8000/delete/${e}`, {
        titulo: "titulo",
        descricao: "descricao",
      });
      setTimeout(() => {
        this.get();
      }, 400);
    },
    update(e) {
      console.log(e);
      axios.put(`http://127.0.0.1:8000/update/${e}`, this.dados);
      this.dados.nome = "";
      this.dados.email = "";
      this.dados.telefone = "";
      this.dados.date = "";
      this.close = "close";
      setTimeout(() => {
        this.get();
      }, 400);
    },
  },
  mounted() {
    this.get();
  },
};
</script>

<style scoped src="./contatos CSS/contatos.css"></style>
