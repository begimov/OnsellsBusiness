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
          'slug' => 'avto',
        ],
        [
          'name' => 'Всё для дома',
          'slug' => 'vse-dlya-doma',
        ],
        [
          'name' => 'Дети',
          'slug' => 'deti',
        ],
        [
          'name' => 'Еда',
          'weight' => 1,
          'slug' => 'eda',
        ],
        [
          'name' => 'Зоо',
          'slug' => 'zoo',
        ],
        [
          'name' => 'Красота и здоровье',
          'slug' => 'krasota-i-zdorovye',
        ],
        [
          'name' => 'Магазины',
          'slug' => 'magaziny',
        ],
        [
          'name' => 'Обучение',
          'slug' => 'obuchenie',
        ],
        [
          'name' => 'Развлечения',
          'slug' => 'razvlecheniya',
        ],
        [
          'name' => 'Услуги',
          'slug' => 'uslugi',
        ],
        //Авто
        ['parent_id' => 1, 'name' => 'АЗС', 'slug' => 'azs'],
        ['parent_id' => 1, 'name' => 'Автосервисы', 'slug' => 'avtoservisy'],
        ['parent_id' => 1, 'name' => 'Cалоны', 'slug' => 'avto-salony'],
        ['parent_id' => 1, 'name' => 'Мойки', 'slug' => 'moyki'],
        ['parent_id' => 1, 'name' => 'Страхование', 'slug' => 'avto-strahovanie'],
        ['parent_id' => 1, 'name' => 'Авто', 'slug' => 'auto'],
        //Всё для дома
        ['parent_id' => 2, 'name' => 'Мебель', 'slug' => 'mebel'],
        ['parent_id' => 2, 'name' => 'Техника', 'slug' => 'tehnika'],
        ['parent_id' => 2, 'name' => 'Шторы', 'slug' => 'shtory'],
        //Дети
        ['parent_id' => 3, 'name' => 'Частные сады', 'slug' => 'chastnye-sady'],
        ['parent_id' => 3, 'name' => 'Студии', 'slug' => 'studii'],
        ['parent_id' => 3, 'name' => 'Детские центры', 'slug' => 'detskie-centry'],
        //Еда
        ['parent_id' => 4, 'name' => 'Кафе', 'slug' => 'cafe'],
        ['parent_id' => 4, 'name' => 'Бары', 'slug' => 'bary'],
        ['parent_id' => 4, 'name' => 'Пабы', 'slug' => 'paby'],
        ['parent_id' => 4, 'name' => 'Рестораны', 'weight' => 1, 'slug' => 'restorany'],
        ['parent_id' => 4, 'name' => 'Доставка', 'slug' => 'dostavka'],
        //Зоо
        ['parent_id' => 5, 'name' => 'Ветеринарные клиники', 'slug' => 'veterinarnye-kliniki'],
        ['parent_id' => 5, 'name' => 'Зоомагазины', 'slug' => 'zoomagaziny'],
        ['parent_id' => 5, 'name' => 'Зоосалоны', 'slug' => 'zoosalony'],
        ['parent_id' => 5, 'name' => 'Услуги для животных', 'slug' => 'uslugi-dlya-zhivotnyh'],
        //Красота и здоровье
        ['parent_id' => 6, 'name' => 'Салоны', 'slug' => 'krasota-i-zdorovye-salony'],
        ['parent_id' => 6, 'name' => 'Клиники', 'slug' => 'kliniki'],
        ['parent_id' => 6, 'name' => 'Стоматологии', 'slug' => 'stomatologii'],
        ['parent_id' => 6, 'name' => 'Фитнес', 'slug' => 'fitnes'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Универсамы', 'slug' => 'universamy'],
        ['parent_id' => 7, 'name' => 'Супермаркеты', 'slug' => 'supermarkety'],
        ['parent_id' => 7, 'name' => 'Обувные магазины', 'slug' => 'obuvnye-magaziny'],
        ['parent_id' => 7, 'name' => 'Магазины с одеждой', 'slug' => 'magaziny-s-odezhdoy'],
        //Обучение
        ['parent_id' => 8, 'name' => 'Иностранные языки', 'slug' => 'inostrannye-yazyki'],
        ['parent_id' => 8, 'name' => 'Танцы', 'slug' => 'tancy'],
        ['parent_id' => 8, 'name' => 'Спорт', 'slug' => 'sport'],
        //Развлечения
        ['parent_id' => 9, 'name' => 'Кинотеатры', 'slug' => 'kinoteatry'],
        ['parent_id' => 9, 'name' => 'Мероприятия', 'slug' => 'meropriyatiya'],
        ['parent_id' => 9, 'name' => 'Квесты', 'slug' => 'kvesty'],
        ['parent_id' => 9, 'name' => 'Боулинг и бильярд', 'slug' => 'bouling-i-bilyard'],
        ['parent_id' => 9, 'name' => 'Аквапарки', 'slug' => 'akvaparki'],
        //Услуги
        ['parent_id' => 10, 'name' => 'Ремонт', 'slug' => 'remont'],
        ['parent_id' => 10, 'name' => 'Страхование', 'slug' => 'uslugi-strahovanie'],
        ['parent_id' => 10, 'name' => 'Юридическая помощь', 'slug' => 'yuridicheskaya-pomoshy'],
        ['parent_id' => 10, 'name' => 'Боулинг и бильярд', 'slug' => 'uslugi-bouling-i-bilyard'],
        ['parent_id' => 10, 'name' => 'Туризм', 'slug' => 'turizm'],
        //Еда
        ['parent_id' => 4, 'name' => 'Бизнес-ланчи', 'slug' => 'biznes-lanchi'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Спорттовары', 'slug' => 'sporttovary'],
        //Развлечения
        ['parent_id' => 9, 'name' => 'Аттракционы', 'slug' => 'attrakciony'],
        ['parent_id' => 9, 'name' => 'Дни рождения', 'slug' => 'dni-rozhdeniya'],
        ['parent_id' => 9, 'name' => 'Промо-акции и розыгрыши', 'slug' => 'promo-akcii-i-rozygryshi'],
        //Услуги
        ['parent_id' => 10, 'name' => 'Аренда', 'slug' => 'arenda'],
        ['parent_id' => 10, 'name' => 'Прокат', 'slug' => 'prokat'],
        ['parent_id' => 10, 'name' => 'Фотостудии', 'slug' => 'fotostudii'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Цветы', 'slug' => 'cvety'],
        //Еда
        ['parent_id' => 4, 'name' => 'Караоке', 'slug' => 'karaoke'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Детские магазины', 'slug' => 'detskie-magaziny'],
        ['parent_id' => 7, 'name' => 'Аптеки', 'slug' => 'apteki'],
        ['parent_id' => 7, 'name' => 'Питьевая вода', 'slug' => 'pityevaya-voda'],
        ['parent_id' => 7, 'name' => 'Разливное пиво', 'slug' => 'razlivnoe-pivo'],
        //Магазины
        ['parent_id' => 7, 'name' => 'Ювелирные магазины', 'slug' => 'uvelirnye-magaziny'],
        ['parent_id' => 7, 'name' => 'Бытовая техника и электроника', 'slug' => 'bytovaya-tehnika-i-elektronika'],
        ['parent_id' => 7, 'name' => 'Спортивное питание', 'slug' => 'sportivnoe-pitanie'],
        //Обучение
        ['parent_id' => 8, 'name' => 'Музыкальные школы', 'slug' => 'muzykalynye-shkoly'],
        ['parent_id' => 8, 'name' => 'Автошколы', 'slug' => 'avtoshkoly'],
        //Услуги
        ['parent_id' => 10, 'name' => 'Прачечные', 'slug' => 'prachechnye'],
        ['parent_id' => 10, 'name' => 'Банки', 'slug' => 'banki'],
        ['parent_id' => 10, 'name' => 'Недвижимость', 'slug' => 'nedvizhimosty'],
        ['parent_id' => 10, 'name' => 'Ателье', 'slug' => 'atelye'],
        //Развлечения
        ['parent_id' => 9, 'name' => 'Ночные клубы', 'slug' => 'nochnye-kluby'],
        ['parent_id' => 9, 'name' => 'Экскурсии и выставки', 'slug' => 'ekskursii-i-vystavki'],
        //Красота и здоровье
        ['parent_id' => 6, 'name' => 'Массаж', 'slug' => 'massazh'],
      ];
      foreach ($categories as $key => $value) {
        DB::table('categories')->insert($value);
      }
    }
}
