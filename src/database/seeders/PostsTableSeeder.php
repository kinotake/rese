<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::table('posts')->insert([
        [    
            'score' => 5,
            'comment' => 'ここは本当に絶品の宝庫！料理のクオリティが高く、特に新鮮な海産物の料理は絶対的おすすめ。スタッフのサービスも心温まり、居心地が良い。リラックスした雰囲気で美味しいひとときを過ごせました。また行きたいお店！',
            'post_header' => '長居しちゃうんだよな',
            'shop_id' => 1,
            'user_id' => 1,
        ],
        [    
            'score' => 3,
            'comment' => 'まあまあの印象でした。料理は美味しかったけれど、特別な感動はなかったです。サービスも普通でしたが、何か足りない気がしました。リーズナブルな価格でしたが、次回は別のお店にも挑戦してみたいかな。',
            'post_header' => 'うーん、いまいち',
            'shop_id' => 3,
            'user_id' => 1,
        ],
        [    
            'score' => 5,
            'comment' => '最高の食体験！シェフの創造力が光り、料理のバラエティが素晴らしい。見た目も美しく、味も満足。スタッフの気遣いが心地よく、アットホームな雰囲気で楽しい時間が流れました。リーズナブルな価格で、最高のコストパフォーマンス。',
            'post_header' => 'コスパ最強',
            'shop_id' => 5,
            'user_id' => 1,
        ],
        [    
            'score' => 4,
            'comment' => 'まあまあの食体験でした。料理は味は悪くないけれど、何か物足りなさを感じました。店内の雰囲気は平凡で、特別感がありませんでした。価格はリーズナブルでしたが、また行くかは微妙です。',
            'post_header' => '何か微妙',
            'shop_id' => 7,
            'user_id' => 1,
        ],
        [    
            'score' => 5,
            'comment' => '地元愛が感じられるお店！地産地消の食材を使い、家庭的な味わいが魅力的。スタッフの笑顔が印象的で、心温まるサービスに感謝。特に季節のメニューが楽しめるのが嬉しい。また友人を連れて行きたいお気に入りの場所。',
            'post_header' => '最高！大好き',
            'shop_id' => 11,
            'user_id' => 1,
        ],
        [    
            'score' => 2,
            'comment' => 'コップを倒されました。わざとではないだろうけど落ち込んだ。味はおいしい。',
            'post_header' => 'うーん',
            'shop_id' => 1,
            'user_id' => 2,
        ],
        [    
            'score' => 5,
            'comment' => 'シンプルでおいしい。最高。',
            'post_header' => 'そぼくだなあ',
            'shop_id' => 3,
            'user_id' => 2,
        ],
        [    
            'score' => 5,
            'comment' => '安いね。味もいいよ',
            'post_header' => 'おすすめ',
            'shop_id' => 5,
            'user_id' => 2,
        ],
        [    
            'score' => 4,
            'comment' => '私は好きです。従業員さんの仲がいいのか、店内が少しにぎやかだった。',
            'post_header' => 'なかなか',
            'shop_id' => 7,
            'user_id' => 2,
        ],
        [    
            'score' => 1,
            'comment' => '店員さんの態度が悪かった。味は濃すぎて、ほとんど残しました。店の屋根も壊れていた。もう行かないかな。',
            'post_header' => 'もう行きません',
            'shop_id' => 11,
            'user_id' => 2,
        ],
    ]);
    }
}
