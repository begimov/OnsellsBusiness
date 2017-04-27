<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        [
          'name' => 'Авто',
        ],
        [
          'name' => 'Всё для дома',
        ],
        [
          'name' => 'Дети',
        ],
        [
          'name' => 'Еда',
          'weight' => 1,
        ],
        [
          'name' => 'Зоо',
        ],
        [
          'name' => 'Красота и здоровье',
        ],
        [
          'name' => 'Магазины',
        ],
        [
          'name' => 'Обучение',
        ],
        [
          'name' => 'Развлечения',
        ],
        [
          'name' => 'Услуги',
        ],
        //Авто
        ['parent_id' => 1, 'name' => 'АЗС'],
        ['parent_id' => 1, 'name' => 'Автосервисы'],
        ['parent_id' => 1, 'name' => 'Cалоны'],
        ['parent_id' => 1, 'name' => 'Мойки'],
        ['parent_id' => 1, 'name' => 'Страхование'],
        ['parent_id' => 1, 'name' => 'Авто'],
        //Всё для дома
        ['parent_id' => 2, 'name' => 'Мебель'],
        ['parent_id' => 2, 'name' => 'Техника'],
        ['parent_id' => 2, 'name' => 'Шторы'],
        //Дети
        ['parent_id' => 3, 'name' => 'Частные сады'],
        ['parent_id' => 3, 'name' => 'Студии'],
        ['parent_id' => 3, 'name' => 'Детские центры'],
        //Еда
        ['parent_id' => 4, 'name' => 'Кафе'],
        ['parent_id' => 4, 'name' => 'Бары'],
        ['parent_id' => 4, 'name' => 'Пабы'],
        ['parent_id' => 4, 'name' => 'Рестораны', 'weight' => 1],
        ['parent_id' => 4, 'name' => 'Доставка'],
        //Зоо
        ['parent_id' => 5, 'name' => 'Ветеринарные клиники'],
        ['parent_id' => 5, 'name' => 'Зоомагазины'],
        ['parent_id' => 5, 'name' => 'Зоосалоны'],
        ['parent_id' => 5, 'name' => 'Услуги для животных'],
        //Красота и здоровье
        ['parent_id' => 6, 'name' => 'Салоны'],
        ['parent_id' => 6, 'name' => 'Клиники'],
        ['parent_id' => 6, 'name' => 'Стоматологии'],
        ['parent_id' => 6, 'name' => 'Фитнес'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Универсамы'],
        ['parent_id' => 7, 'name' => 'Супермаркеты'],
        ['parent_id' => 7, 'name' => 'Обувные магазины'],
        ['parent_id' => 7, 'name' => 'Магазины с одеждой'],
        //Обучение
        ['parent_id' => 8, 'name' => 'Иностранные языки'],
        ['parent_id' => 8, 'name' => 'Танцы'],
        ['parent_id' => 8, 'name' => 'Спорт'],
        //Развлечения
        ['parent_id' => 9, 'name' => 'Кинотеатры'],
        ['parent_id' => 9, 'name' => 'Мероприятия'],
        ['parent_id' => 9, 'name' => 'Квесты'],
        ['parent_id' => 9, 'name' => 'Боулинг и бильярд'],
        ['parent_id' => 9, 'name' => 'Аквапарки'],
        //Услуги
        ['parent_id' => 10, 'name' => 'Ремонт'],
        ['parent_id' => 10, 'name' => 'Страхование'],
        ['parent_id' => 10, 'name' => 'Юридическая помощь'],
        ['parent_id' => 10, 'name' => 'Боулинг и бильярд'],
        ['parent_id' => 10, 'name' => 'Туризм'],
      ];
      foreach ($categories as $key => $value) {
        DB::table('categories')->insert($value);
      }
    }
}
