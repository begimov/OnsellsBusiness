<template>
  <div class="row">
    <div class="col-md-12">

      <form action="#" method="post" @submit.prevent="openSelectedApps">
        <table class="table table-striped" v-if="apps.length">
          <thead>
            <tr>
              <th></th>
              <th>Имя</th>
              <th>Email</th>
              <th>Телефон</th>
            </tr>
          </thead>
          <tbody>
            <template v-for="application in apps">
              <tr>
                <td><input type="checkbox" :value="application.id" v-if="!application.paid" v-model="selectedApps"></td>
                <td>{{ application.user.name }}</td>
                <td>
                  <p v-if="application.user.email">{{ application.user.email }}</p>
                  <p v-else>{{ new Array(Math.floor(Math.random() * 10 + 10) + 1).join('*') }}</p>
                </td>
                <td>
                  <p v-if="application.user.phone">{{ application.user.phone }}</p>
                  <p v-else>{{ new Array(Math.floor(Math.random() * 10 + 10) + 1).join('*') }}</p>
                </td>
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
                <p v-if="balanceAmount - orderPrice < 0">
                  Необходимо <a :href="this.balanceroute">пополнить баланс</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="disabledBtn">Открыть выбранные</button>
      </form>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apps: JSON.parse(this.applications),
      selectedApps: [],
      balanceAmount: JSON.parse(this.balance).amount,
      isLoading: false
    }
  },
  props: [
    'applications',
    'balance',
    'appbaseprice',
    'balanceroute',
    'checkoutroute'],

  computed: {
    order() {
      return this.selectedApps.length
    },
    orderPrice() {
      return this.selectedApps.length * this.appbaseprice
    },
    disabledBtn() {
      return this.selectedApps.length == 0 || this.balanceAmount - this.orderPrice < 0 || this.isLoading
    }
  },
  methods: {
    openSelectedApps() {
      this.isLoading = true;
      axios.post(this.checkoutroute, {
        applications: this.selectedApps
      })
      .then((response) => {
        this.apps = response.data.data.applications
        this.balanceAmount = response.data.data.balance.amount
        this.selectedApps = []
        this.isLoading = false
      })
      .catch((error) => {
        this.isLoading = false
      })
    }
  },
  mounted() {
    //
  }
}
</script>
