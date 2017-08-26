<template>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped" v-if="apps.length">
        <thead>
          <tr>
            <th><input type="checkbox" value="" @change="selectAll"></th>
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
                <p v-else><a href="#" class="btn btn-default btn-xs" @click.prevent="openUser">Открыть контакт</a></p>
              </td>
              <td>{{ application.created_at }}</td>
            </tr>
          </template>
        </tbody>
      </table>
      <p v-else>Пока новых заявок нет.</p>
      <button type="submit" class="btn btn-primary" @click.submit="submitSelectedApps">Открыть выбранные</button>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        apps: {},
        selectedApps: []
      }
    },
    props: ['applications'],
    methods: {
      openUser() {
        console.log('OPEN')
      },
      submitSelectedApps() {
        console.log(this.selectedApps)
      },
      selectAll() {
        console.log('SELECT ALL');
      }
    },
    mounted() {
      this.apps = JSON.parse(this.applications)
    }
  }
</script>
