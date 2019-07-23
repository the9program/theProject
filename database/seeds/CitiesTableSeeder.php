<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    public function run()
    {
        $cities = [
            'casablanca', 'rabat', 'marrakech', 'fès', 'tanger',
            'agadir', 'kénitra', 'salé', 'meknès', 'oujda',
            'el jadida', 'mohammédia', 'témara', 'tétouan',
            'beni mellal', 'nador', 'khouribga', 'safi', 'settat',
            'berkane', 'taza', 'inezgane', 'berrechid', 'khemisset',
            'larache', 'sidi kacem', 'laayoune', 'khenifra',
            'ait melloul', 'fquih ben salah', 'sidi slimane',
            'tiznit', 'al hoceima', 'sefrou', 'kelaat sraghna',
            'taroudant', 'ksar el kebir', 'oulad teima', 'taounate',
            'essaouira', 'taourirt', 'rommani', 'sidi bennour',
            'guelmim', 'tiflet', 'youssoufia', 'benslimane', 'ben guerir',
            'oued zem', 'dcheira', 'ouarzazate', 'guercif', 'souk el arbaa du gharb',
            'mechra bel ksiri', 'chefchaouen', 'fnideq', 'errachidia', 'ouazzane',
            'azrou', 'bouznika', 'azemmour', 'al aaroui', 'skhirat', 'dakhla',
            'tinghir', 'zemamra', 'martil', 'mdiq', 'sidi yahya du gharb', 'midelt',
            'jerada', 'assilah', 'zaïo', 'biougra', 'kasba tadla', 'el hajeb',
            'm\'rirt', 'targuist', 'zagora', 'sebt gzoula', 'imzouren', 'ben ahmed',
            'boulemane', 'lbir jdid', 'bensergao', 'ait ourir', 'kalaat mgouna', 'azilal',
            'ahfir', 'ifrane', 'er rissani', 'had soualem',
            'segangane', 'bouarfa', 'ben taieb', 'tikiouine', 'ait baha', 'ain harrouda',
            'tan tan', 'echemmaia', 'bab berred', 'imintanoute', 'sebt ouled nemma',
            'anza', 'midar', 'sidi allal el bahraoui', 'ain taoujdate',
            'afourar', 'sidi allal tazi', 'arfoud', 'jamâat shaim', 'sidi bouknadel',
            'demnate', 'attaouia', 'goulmima', 'aklim', 'ras el ain', 'maaziz', 'er rich',
            'el aioun', 'al haouz', 'had kourt', 'ain el aouda', 'sidi rahal',
            'ain bni mathar', 'selouane', 'ain leuh', 'arekmane', 'issaguen', 'bnidrar',
            'ouled frej', 'chichaoua', 'lamjaara', 'ait amira', 'my idriss zerhoune',
            'moulay bousselham', 'souk sebt', 'ain atik', 'dcheira el jihadia',
            'ouled teima', 'oualidia', 'tamesna', 'taliouine', 'tamallalt', 'deroua',
            'agourai', 'sidi ifni', 'driouch', 'karia ba mohamed', 'beni bouifrour',
            'massa', 'beni enzar', 'el gara', 'bejaad', 'tit mellil', 'taznakht',
            'belfaa', 'farkhana', 'sidi smail', 'ouled ayad', 'temsamane', 'laaounate',
            'tendrara', 'bouizakarne', 'aoulouz', 'ouled boughadi', 'lakhsas', 'ain zohra',
            'boujdour', 'missour', 'skhour rhamna', 'el hanchane', 'beni ansar',
            'khouribgua', 'sidi bibi', 'tazarine', 'figuig',
            'dar el kebdani', 'asjen', 'jemaa shaim', 'ouled hcine', 'tineghir', 'laouamra',
            'sidi bou othmane', 'souk tlet el gharb', 'tissa', 'beni drar', 'nouasseur',
            'sidi el aidi', 'foum jemaa', 'boumalne dades',
            'jorf el melha', 'ouled yaich', 'tnine oudaya', 'el kbab', 'sidi el yamani',
            'ouaouizeght', 'oulmes', 'aghbala', 'el ksiba', 'loudaya', 'tadla',
            'sidi hajjaj', 'ait yadine', 'tamanar', 'drargua',
            'outat el haj', 'el ouatia', 'lqliaa', 'tamsia', 'sidi jaber', 'oued laou',
            'saidia', 'guisser', 'ketama',
            'zoumi', 'bni chiker', 'sidi mohammed ben rahal', 'oulad abbou',
            'el aioun sidi mellouk', 'bouskoura',
            'bni rzine', 'sidi ouassay', 'oulad berhil', 'oulad said', 'tata',
            'ain attiq', 'es semara', 'bni ykhlef',
            'amzmiz', 'hattane', 'selfat', 'ezzhiliga', 'anezi', 'imouzzer kender',
            'oulad zbair', 'khnichet',
            'ain erragada', 'boufakrane', 'mhaya', 'el ghiate', 'sidi lmokhtar',
            'lakhssas', 'fdalate', 'bouguedra',
            'anzi', 'ouled berhil', 'el guerdane', 'laatamna', 'boujad'
        ];

        foreach ($cities as $city) {

            City::create([
                'city'      => $city
            ]);

        }

    }

}
