<template>
  <div class="container">
    <div class="card">
      <CardHeader
        title="Clientes"
        icon="dns"
        :btnActive="true"
        route="/tenant/costumers/create"
        btnTitle="Novo"
      />

      <div class="col-md-12 d-flex justify-content-end">
        <div class="col-md-6">
          <div class="form-group label-floating">
            <label class="bmd-label-floating" for="search">Buscar</label>
            <input type="text" id="search" class="form-control" v-model="search" autofocus />
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr style>
                <th class="text-left">NOME</th>
                <th class="text-left">TELEFONE</th>
                <th class="text-left">EMAIL</th>
                <th class="text-left">DATA DE NASCIMENTO</th>
                <th class="disabled-sorting text-right">Ações</th>
              </tr>
            </thead>
            <tbody>
              <template v-if="!search">
                <tr v-for="( costumer, i) in costumersPerPage" :key="i">
                  <td class="text-left">{{ costumer.name }}</td>
                  <td class="text-left">{{ costumer.phone }}</td>
                  <td class="text-left">{{ costumer.email }}</td>
                  <td class="text-left">{{ costumer.birth }}</td>
                  <td class="td-actions text-right">
                    <a
                      class="nav-link"
                      href="javascript:;"
                      id="navbarDropdownProfile"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="material-icons">more_vert</i>
                      <p class="d-lg-none d-md-block">Account</p>
                    </a>
                    <div
                      class="dropdown-menu dropdown-menu-right"
                      aria-labelledby="navbarDropdownProfile"
                    >
                      <a
                        class="dropdown-item"
                        :href="'/tenant/costumers/'+costumer.id+'/edit'"
                      >Editar</a>
                      <a
                        class="dropdown-item"
                        href
                        data-toggle="modal"
                        data-target="#deleteCostumerModal"
                      >Excluir</a>
                    </div>
                  </td>
                </tr>
              </template>
              <template v-else>
                <tr v-for="(costumer, i) in filteredList" :key="i">
                  <td class="text-left">{{ costumer.name }}</td>
                  <td class="text-left">{{ costumer.phone }}</td>
                  <td class="text-left">{{ costumer.email }}</td>
                  <td class="text-left">{{ costumer.birth }}</td>
                  <td class="td-actions text-right">
                    <a
                      class="nav-link"
                      href="javascript:;"
                      id="navbarDropdownProfile"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="material-icons">more_vert</i>
                      <p class="d-lg-none d-md-block">Account</p>
                    </a>
                    <div
                      class="dropdown-menu dropdown-menu-right"
                      aria-labelledby="navbarDropdownProfile"
                    >
                      <a
                        class="dropdown-item"
                        :href="'/tenant/costumers/'+costumer.id+'/edit'"
                      >Editar</a>
                      <a
                        class="dropdown-item"
                        href
                        data-toggle="modal"
                        data-target="#deleteCostumerModal"
                      >Excluir</a>
                    </div>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <pagination
          :page-count="last_page"
          :click-handler="clickCallback"
          :page-range="11"
          :prev-text="'‹'"
          :next-text="'›'"
          :container-class="'pagination'"
          page-class="page-item"
          page-link-class="page-link"
        ></pagination>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CardHeader from "./CardHeader";
export default {
  mounted() {
    this.getCostumersPerPage();
    this.getCostumers();
  },
  data() {
    return {
      costumersPerPage: null,
      costumers: {},
      search: "",
      last_page: 10
    };
  },
  components: { CardHeader },
  computed: {
    filteredList() {
      if (this.costumers) {
        return this.costumers.filter(costumer => {
          return costumer.name
            .toLowerCase()
            .includes(this.search.toLowerCase());
        });
      }
    }
  },
  methods: {
    clickCallback(pageNum) {
      axios
        .get("http://localhost:8000/api/tenant/costumers/pages?page=" + pageNum)
        .then(resp => {
          this.costumersPerPage = resp.data.pages.data;
        })
        .catch(resp => console.log(resp.data));
    },

    getCostumers() {
      axios("/tenant/costumers")
        .then(resp => {
          this.costumers = resp.data;
        })
        .catch(resp => {
          console.log(resp.data);
        });
    },

    getCostumersPerPage() {
      axios("/tenant/costumers/pages")
        .then(resp => {
          this.costumersPerPage = resp.data.pages.data;
          this.last_page = resp.data.pages.last_page;
        })
        .catch(resp => {
          console.log(resp.data);
        });
    }
  }
};
</script>
