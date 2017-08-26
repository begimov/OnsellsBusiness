<template>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Дата</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="application in apps">
            <tr>
              <td colspan="3">
                <strong>&laquo;{{ application.promotion.promotionname }}&raquo;</strong>
              </td>
            </tr>
            <tr>
              <td>{{ application.user.name }}</td>
              <td>{{ application.user.email }}</td>
              <td>{{ application.created_at }}</td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        apps: {}
      }
    },
    props: ['applications'],
    mounted() {
      this.apps = JSON.parse(this.applications)
    }
  }
</script>

<!-- @if (count($applications) > 0)
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Дата</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($applications as $application)
        <tr>
          <td colspan="3">
            <strong><a href="{{ route('promotion.show', $application->promotion->id) }}">&laquo;{{ $application->promotion->promotionname }}&raquo;</a></strong>
          </td>
        </tr>
        <tr>
          <td>{{ $application->user->name }}</td>
          <td><a href="mailto:{{ $application->user->email }}">{{ $application->user->email }}</a></td>
          <td>{{ $application->created_at->format('d/m') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  Пока новых заявок нет.
@endif -->
