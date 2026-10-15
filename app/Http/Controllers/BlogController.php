<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Get all structured blog posts.
     */
    public static function getPosts(): array
    {
        return [
            'maximize-muscle-recovery-after-intense-session' => [
                'id' => 1,
                'slug' => 'maximize-muscle-recovery-after-intense-session',
                'title' => 'How to Maximize Muscle Recovery After an Intense Session',
                'category' => 'Tips',
                'badge_color' => '#e2ff38',
                'date' => '25 November 2025',
                'read_time' => '5 min read',
                'image' => 'images/blog-1.png',
                'author' => [
                    'name' => 'Alex Cox',
                    'role' => 'Head Strength Coach',
                    'image' => 'images/trainer-1.png',
                ],
                'summary' => 'Discover science-backed recovery protocols, cold/heat contrast therapy, sleep optimization, and post-workout protein synthesis timing to rebound faster.',
                'sections' => [
                    [
                        'heading' => 'Why Recovery Is Where Real Growth Happens',
                        'paragraphs' => [
                            'Pushing your limits in the weight room creates micro-tears in your muscle fibers and depletes intracellular glycogen. While training provides the mechanical stimulus, your body actually rebuilds and grows during the recovery window when cellular repair occurs.',
                            'Without intentional recovery protocols, chronic systemic inflammation sets in, elevating cortisol levels and blunting muscle protein synthesis.',
                        ],
                    ],
                    [
                        'heading' => '1. The Anabolic Refuel Window (First 45 Minutes)',
                        'paragraphs' => [
                            'Within 30 to 45 minutes post-workout, your muscle cells exhibit heightened insulin sensitivity and GLUT-4 transporter activity. Consuming 30–40 grams of fast-digesting protein (whey isolate or plant protein) along with 40–60 grams of easily digestible carbohydrates kickstarts glycogen resynthesis and triggers the mTOR anabolic signaling pathway.',
                        ],
                    ],
                    [
                        'heading' => '2. Myofascial Release & Active Decompression',
                        'paragraphs' => [
                            'Foam rolling isn\'t just a warmup ritual—10 to 15 minutes of foam rolling and mobility stretching after a heavy session breaks up fascial adhesions, stimulates venous blood return, and flushes lactic acid buildup. Concentrate on your quadriceps, IT bands, thoracic spine, and latissimus dorsi.',
                        ],
                    ],
                    [
                        'heading' => '3. The 8-Hour Deep Sleep Rule',
                        'paragraphs' => [
                            'Nearly 95% of natural Human Growth Hormone (HGH) secretion occurs during Stage 3 and Stage 4 slow-wave sleep. If you sleep less than 7 hours after a heavy training day, muscle recovery efficiency drops by up to 40%. Keep your sleeping room dark, maintain ambient temperature below 20°C, and avoid blue light screens 45 minutes before bed.',
                        ],
                    ],
                ],
                'key_takeaways' => [
                    'Hydrate immediately with 500ml water infused with pink Himalayan salt and electrolytes.',
                    'Prioritize 1.6g to 2.2g of protein per kilogram of bodyweight daily.',
                    'Incorporate active recovery days with light 20-minute walking or swimming to promote blood circulation.',
                ],
            ],
            'how-to-stay-consistent-with-your-fitness-routine' => [
                'id' => 2,
                'slug' => 'how-to-stay-consistent-with-your-fitness-routine',
                'title' => 'How to Stay Consistent with Your Fitness Routine',
                'category' => 'Routine',
                'badge_color' => '#00d2ff',
                'date' => '25 November 2025',
                'read_time' => '4 min read',
                'image' => 'images/blog-2.png',
                'author' => [
                    'name' => 'Donald Marshal',
                    'role' => 'Bodybuilding Specialist',
                    'image' => 'images/trainer-2.png',
                ],
                'summary' => 'Eliminate motivation reliance by establishing unbreakable habit loops, progressive goal milestones, and accountability partners.',
                'sections' => [
                    [
                        'heading' => 'Stop Relying on Fleeting Motivation',
                        'paragraphs' => [
                            'Motivation is an emotional wave that crests and falls. When work deadlines pile up, or weather turns cold, motivation evaporates. Athletes who transform their bodies do not rely on motivation—they rely on pre-programmed behavioral friction elimination.',
                        ],
                    ],
                    [
                        'heading' => '1. The "Never Miss Twice" Rule',
                        'paragraphs' => [
                            'Life will inevitably disrupt your training once in a while. An emergency meeting, travel, or family commitment happens. The rule that separates long-term lifters from quitters is simple: you can miss one scheduled day, but you never miss two consecutive sessions under any circumstance.',
                        ],
                    ],
                    [
                        'heading' => '2. Lower Friction The Night Before',
                        'paragraphs' => [
                            'Pack your gym bag, set your gym shoes by the door, and place your pre-workout or water shaker on the kitchen counter the night before. By removing decision-making in the morning, your brain executes on autopilot without negotiation.',
                        ],
                    ],
                    [
                        'heading' => '3. Track Inputs, Not Daily Scale Fluctuations',
                        'paragraphs' => [
                            'Water retention, sodium intake, and carb glycogen make scale weight fluctuate daily by 1–2 kg. Instead of obsessing over daily scale readings, measure consistency inputs: Did you complete 4 workouts this week? Did you hit your daily protein target? Momentum follows measurable inputs.',
                        ],
                    ],
                ],
                'key_takeaways' => [
                    'Schedule workouts into your calendar as non-negotiable appointments.',
                    'Focus on showing up for the first 10 minutes—often that is all it takes to complete the full session.',
                    'Find a training partner or check in with your Fitnes gym coach weekly.',
                ],
            ],
            'strength-vs-cardio-which-should-you-prioritize' => [
                'id' => 3,
                'slug' => 'strength-vs-cardio-which-should-you-prioritize',
                'title' => 'Strength vs. Cardio: Which Should You Prioritize?',
                'category' => 'Guide',
                'badge_color' => '#ff5e36',
                'date' => '25 November 2025',
                'read_time' => '6 min read',
                'image' => 'images/blog-3.png',
                'author' => [
                    'name' => 'Harley Pasternak',
                    'role' => 'Celebrity Performance Coach',
                    'image' => 'images/trainer-3.png',
                ],
                'summary' => 'Unpack the biomechanical differences between resistance training and cardiovascular conditioning to match your body recomposition target.',
                'sections' => [
                    [
                        'heading' => 'The False Dichotomy: Weights vs. Treadmill',
                        'paragraphs' => [
                            'One of the most persistent myths in modern fitness is that you must choose between lifting heavy iron or running miles. The reality is that both energy pathways trigger distinct biological adaptations that synergize when planned properly.',
                        ],
                    ],
                    [
                        'heading' => 'When Strength Must Be Priority #1',
                        'paragraphs' => [
                            'If your goal is body recomposition, muscular definition, and metabolic elevation, resistance training is king. Muscle tissue is metabolically expensive; for every kilogram of muscle you add, your basal metabolic rate burns calories around the clock—even at rest.',
                            'Furthermore, heavy compound movements (squats, deadlifts, presses) preserve bone mineral density and stimulate natural androgen receptor activity as you age.',
                        ],
                    ],
                    [
                        'heading' => 'When Cardio Takes Center Stage',
                        'paragraphs' => [
                            'Cardiovascular conditioning strengthens your heart, lowers resting pulse rate, enhances mitochondrial capillary density, and increases VO2 max. If you get winded climbing two flights of stairs, lifting weights alone will not resolve cardiovascular efficiency.',
                        ],
                    ],
                    [
                        'heading' => 'The Ideal Hybrid Protocol',
                        'paragraphs' => [
                            'For 90% of athletes, the sweet spot is the Hybrid Model: 3 to 4 days of progressive resistance training paired with 2 sessions of Zone 2 aerobic base cardio (maintaining 65–75% of max heart rate) or short HIIT finishers after lifting.',
                        ],
                    ],
                ],
                'key_takeaways' => [
                    'Perform heavy lifting first when your neuromuscular system is fresh, followed by cardio.',
                    'Keep low-intensity Zone 2 cardio separate from leg days to avoid interference effect.',
                    'Nutrition governs results: a caloric deficit drives fat loss, while progressive overload sculpts muscle.',
                ],
            ],
        ];
    }

    /**
     * Show single blog post page.
     */
    public function show(string $slug): View
    {
        $posts = self::getPosts();

        if (! isset($posts[$slug])) {
            abort(404, 'Article not found');
        }

        $post = $posts[$slug];

        // Related posts (excluding current)
        $related = array_filter($posts, fn ($p) => $p['slug'] !== $slug);

        return view('blog.show', [
            'post' => $post,
            'related' => array_slice($related, 0, 2),
        ]);
    }

    /**
     * Return JSON for instant modal reader.
     */
    public function apiShow(string $slug): JsonResponse
    {
        $posts = self::getPosts();

        if (! isset($posts[$slug])) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        return response()->json([
            'success' => true,
            'post' => $posts[$slug],
        ]);
    }
}
