<template>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped" v-if="apps.length">
        <thead>
          <tr>
            <th></th>
            <th>Имя</th>
            <th>Email</th>
            <th>Дата</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="application in apps">
            <tr>
              <td><input type="checkbox" :value="application.id" v-model="selectedApps"></td>
              <td>{{ application.user.name }}</td>
              <td>
                <p v-if="application.user.email">{{ application.user.email }}</p>
                <p v-else><a href="#" class="btn btn-default btn-xs" @click.prevent="openApp(application.id)">Открыть контакт</a></p>
              </td>
              <td>{{ application.created_at }}</td>
            </tr>
          </template>
        </tbody>
      </table>
      <p v-else>Пока новых заявок нет.</p>
      <div v-if="order">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-md-6">
                <p><h4><span class="label label-default">Стоимость:</span></h4> {{ orderPrice }} руб.</p>
              </div>
              <div class="col-md-6">
                <p><h4><span class="label label-default">Доступно:</span></h4> {{ balanceAmount }} руб.</p>
              </div>
            </div>
            <div class="panel-footer text-center">
              <h4><span class="label label-primary">Остаток: {{ balanceAmount - orderPrice }} руб.</span></h4>
              <p v-if="balanceAmount - orderPrice < 0"><span class="label label-danger">Необходимо пополнить баланс</span></p>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" @click.submit="openSelectedApps" :disabled="disabledBtn">Открыть выбранные</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apps: [],
      selectedApps: [],
      balanceAmount: 0
    }
  },
  props: ['applications', 'balance'],
  computed: {
    order() {
      return this.selectedApps.length
    },
    orderPrice() {
      return this.selectedApps.length * 100
    },
    disabledBtn() {
      return this.selectedApps.length == 0 || this.balanceAmount - this.orderPrice < 0
    }
  },
  methods: {
    openApp(id) {
      console.log(id)
    },
    openSelectedApps() {
      console.log(this.selectedApps)
    }
  },
  mounted() {
    this.apps = JSON.parse(this.applications)
    this.balanceAmount = JSON.parse(this.balance).amount
  }
}
</script>
