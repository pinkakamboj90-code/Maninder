<?php
/**
 * Template Name: Maninder English — Levels Page
 */

/* ══════════════════════════════════════════════════════════
   LEVEL DATA — single source of truth for tabs, topics, lessons
   Topic slugs let the "functional filter" JS match pills to cards.
   ══════════════════════════════════════════════════════════ */
$levels = [

  'beginner' => [
    'label'   => 'Beginner',
    'icon'    => 'book',
    'fill'=>'#C8E4F8','mid'=>'#93C8EF','deep'=>'#1A5C96',
    'badge'   => 'Level 1 — Beginner',
    'hi'      => 'शुरुआत यहाँ से',
    'desc'    => "Whether you're starting from zero — even if you can't yet form a full sentence — or you know a little but keep making mistakes, this level builds your foundation from the ground up: alphabet, sentence structure, tenses, basic vocabulary. Everything explained in Hindi so nothing feels confusing.",
    'cefr'    => 'A1–A2',
    'checklist' => [
      "You're starting from zero, or a child just beginning to learn English",
      'You understand simple English but cannot speak confidently',
      'You make basic grammar mistakes in almost every sentence',
      'Hindi explanations help you understand faster than English-only',
    ],
    'topics' => [
      ['slug'=>'alphabet-sounds','label'=>'Alphabet & Sounds'],
      ['slug'=>'sentence-building','label'=>'Basic Sentence Building'],
      ['slug'=>'everyday-greetings','label'=>'Everyday Greetings'],
      ['slug'=>'simple-present','label'=>'Simple Present'],
      ['slug'=>'present-continuous','label'=>'Present Continuous'],
      ['slug'=>'simple-past','label'=>'Simple Past'],
      ['slug'=>'articles','label'=>'Articles (A/An/The)'],
      ['slug'=>'basic-vocabulary','label'=>'Basic Vocabulary'],
      ['slug'=>'introductions','label'=>'Introductions'],
      ['slug'=>'daily-routines','label'=>'Daily Routines'],
      ['slug'=>'numbers-time','label'=>'Numbers & Time'],
      ['slug'=>'question-formation','label'=>'Question Formation'],
      ['slug'=>'negative-sentences','label'=>'Negative Sentences'],
      ['slug'=>'prepositions','label'=>'Prepositions'],
      ['slug'=>'adjectives','label'=>'Adjectives & Describing Words'],
      ['slug'=>'common-mistakes','label'=>'Common Mistakes'],
      ['slug'=>'possessives','label'=>'Possessives (My/Your/His)'],
      ['slug'=>'demonstratives','label'=>'This, That, These, Those'],
      ['slug'=>'there-is-there-are','label'=>'There Is / There Are'],
      ['slug'=>'modals-ability-permission','label'=>'Can & Could (Ability, Permission)'],
      ['slug'=>'countable-uncountable','label'=>'Countable & Uncountable Nouns'],
      ['slug'=>'contractions','label'=>'Contractions (I\'m, Don\'t, Can\'t)'],
      ['slug'=>'days-months-seasons','label'=>'Days, Months & Seasons'],
      ['slug'=>'quantifiers','label'=>'Some, Any, Much, Many & Few'],
    ],
    'lessons' => [
      ['topic'=>'Foundations','title'=>'The English Alphabet & Sounds — Starting From Zero','hindi'=>'Bilkul shuruaat se — A se Z tak','desc'=>'For learners who cannot yet form a full sentence. Every letter, its sound, and how to say it correctly — no prior English needed.','tags'=>['alphabet-sounds'],'status'=>'live','link_slug'=>'the-english-alphabet-sounds-starting-from-zero'],
      ['topic'=>'Foundations','title'=>'How to Build Your First English Sentence','hindi'=>'Pehla sentence kaise banayein','desc'=>'Subject + verb + object — the one pattern that lets a total beginner start speaking today, explained with everyday examples.','tags'=>['sentence-building'],'status'=>'live','link_slug'=>'how-to-build-your-first-english-sentence'],
      ['topic'=>'Foundations','title'=>'Everyday Greetings Every Beginner Must Know','hindi'=>'Roz ke greetings — shuruaat yahin se','desc'=>'"Hello", "How are you", "Nice to meet you" — the first words every learner, including children, needs before anything else.','tags'=>['everyday-greetings'],'status'=>'live','link_slug'=>'everyday-greetings-every-beginner-must-know'],
      ['topic'=>'Foundations','title'=>'The Present Simple Tense — Habits, Facts & Daily Life','hindi'=>'Roz ki baatein English mein kaise bolein','desc'=>'The tense you\'ll use most as a beginner — habits, routines, and facts. The structure, the tricky "-s" rule, and how to build your own sentences.','tags'=>['simple-present'],'status'=>'live','link_slug'=>'the-present-simple-tense-habits-facts-daily-life'],
      ['topic'=>'Grammar','title'=>'Why "I am having a doubt" is wrong','hindi'=>'"Doubt" ka sahi use','desc'=>'The most common mistake Indian English speakers make — and how your brain can unlearn it permanently.','tags'=>['common-mistakes'],'status'=>'live','link_slug'=>'why-i-am-having-a-doubt-is-wrong'],
      ['topic'=>'Vocabulary','title'=>"10 Words You're Using Wrong Every Day",'hindi'=>'Roz ki 10 common galtiyan','desc'=>'Words like "prepone", "revert", and "do the needful" — why they confuse native speakers.','tags'=>['basic-vocabulary','common-mistakes'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Simple Present vs Present Continuous','hindi'=>'Present tense — dono mein fark','desc'=>'When to say "I go to work" vs "I am going to work" — the rule your textbook never explained clearly.','tags'=>['simple-present','present-continuous'],'status'=>'soon'],
      ['topic'=>'Pronunciation','title'=>'How to Pronounce "The" Correctly','hindi'=>'"The" kaise bolen — sahi tarika','desc'=>'Two pronunciations of "the" — most Indian learners use the wrong one 90% of the time.','tags'=>['articles'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'A, An, The — The Complete Guide','hindi'=>'Articles ka pura guide','desc'=>'All three articles explained with rules, exceptions, and Hindi examples. Finally makes sense.','tags'=>['articles'],'status'=>'soon'],
      ['topic'=>'Speaking','title'=>'How to Introduce Yourself in English','hindi'=>'Apna introduction kaise den','desc'=>'Not "Myself Rahul." The right way to introduce yourself in professional and casual situations.','tags'=>['introductions'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Simple Past — Talking About Yesterday','hindi'=>'Past tense — kal kya hua, bataana seekho','desc'=>'"I go" becomes "I went" — regular and irregular verbs explained simply, with the irregular verbs Indian learners mix up most.','tags'=>['simple-past'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Some, Any, Much, Many & Few — Which One Do I Use?','hindi'=>'Some, any, much, many — kab kaunsa','desc'=>'"I have some water" but "Do you have any water?" — the simple rule beginners are rarely shown clearly.','tags'=>['quantifiers'],'status'=>'soon'],
    ],
    'cta_h' => 'New Beginner lessons every week',
    'cta_p' => 'Subscribe so you never miss a new lesson.',
    'cta_hi'=> 'Subscribe karo — free rahega hamesha',
  ],

  'intermediate' => [
    'label'   => 'Intermediate',
    'icon'    => 'bubbles',
    'fill'=>'#FAD5CF','mid'=>'#F4A89E','deep'=>'#B04020',
    'badge'   => 'Level 2 — Intermediate',
    'hi'      => 'अगला कदम',
    'desc'    => 'You can have basic conversations but your English sounds textbook — not natural. This level focuses on fluency: phrasal verbs, conversational patterns, and thinking directly in English.',
    'cefr'    => 'B1–B2',
    'checklist' => [
      'You understand English but translate from Hindi in your head',
      'Your grammar is okay but you sound formal and unnatural',
      'Phrasal verbs confuse you — "put off", "look into", "bring up"',
      'You want to hold real conversations without hesitation',
    ],
    'topics' => [
      ['slug'=>'phrasal-verbs','label'=>'Phrasal Verbs'],
      ['slug'=>'perfect-tenses','label'=>'Present Perfect'],
      ['slug'=>'present-perfect-continuous','label'=>'Present Perfect Continuous'],
      ['slug'=>'past-continuous','label'=>'Past Continuous'],
      ['slug'=>'future-simple','label'=>'Future Simple'],
      ['slug'=>'reported-speech','label'=>'Reported Speech'],
      ['slug'=>'conjunctions','label'=>'Conjunctions'],
      ['slug'=>'natural-conversation','label'=>'Natural Conversation'],
      ['slug'=>'comparatives-superlatives','label'=>'Comparatives & Superlatives'],
      ['slug'=>'reading','label'=>'Reading'],
      ['slug'=>'listening-skills','label'=>'Listening Skills'],
      ['slug'=>'modals-obligation','label'=>'Must, Have To & Should'],
      ['slug'=>'polite-requests','label'=>'Would You Mind...? Polite Requests'],
      ['slug'=>'conditionals','label'=>'If Sentences & Conditionals'],
      ['slug'=>'passive-voice','label'=>'Passive Voice'],
      ['slug'=>'prepositions-time-place','label'=>'Prepositions of Time & Place'],
      ['slug'=>'gerunds-infinitives','label'=>'Verb + -ing or to... (Gerunds & Infinitives)'],
    ],
    'lessons' => [
      ['topic'=>'Phrasal Verbs','title'=>'20 Everyday Phrasal Verbs You Already Need','hindi'=>'Roz kaam aane waale phrasal verbs','desc'=>'Wake up, put off, look into, run into — 20 of the most common phrasal verbs, grouped by real-life situation, with practice built in as you go.','tags'=>['phrasal-verbs'],'status'=>'live','link_slug'=>'20-everyday-phrasal-verbs-you-already-need'],
      ['topic'=>'Phrasal Verbs','title'=>'10 British Office Phrasal Verbs','hindi'=>'Office phrases — real use','desc'=>'Touch base, chase up, loop in, circle back — real phrases from London workplaces with full context.','tags'=>['phrasal-verbs'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Present Perfect vs Simple Past','hindi'=>'Have done vs Did — finally clear','desc'=>'"I have eaten" vs "I ate" — the simple rule that fixes this confusion forever.','tags'=>['perfect-tenses'],'status'=>'soon'],
      ['topic'=>'Speaking','title'=>'How to Stop Translating From Hindi','hindi'=>'Hindi mein sochna band karo','desc'=>'The psychology of language switching and 3 techniques to think directly in English.','tags'=>['natural-conversation'],'status'=>'soon'],
      ['topic'=>'Vocabulary','title'=>'British vs American English','hindi'=>'British aur American English','desc'=>'Lift vs elevator, biscuit vs cookie, boot vs trunk — which to use and when.','tags'=>['natural-conversation'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Modal Verbs — Can, Could, Should, Would','hindi'=>'Modals ka sahi use','desc'=>'Why "can I" sounds rude but "could I" sounds polite in British English — and when to use each.','tags'=>['natural-conversation'],'status'=>'soon'],
      ['topic'=>'Listening','title'=>'Why You Struggle to Understand Native Speakers','hindi'=>'Native speakers ko samajhna','desc'=>'Connected speech, weak forms, contractions — the hidden patterns in fast natural English.','tags'=>['listening-skills'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Present Perfect Continuous — "I Have Been Working"','hindi'=>'Have been + ing — kab use karein','desc'=>'The tense that shows an action started in the past and is still continuing — with real workplace examples.','tags'=>['present-perfect-continuous'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Past Continuous — "I Was Working"','hindi'=>'Was/Were + ing — kab use karein','desc'=>'Describing an action in progress at a specific moment in the past, and exactly how it differs from Simple Past.','tags'=>['past-continuous'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Will vs Going To — What\'s the Real Difference','hindi'=>'Future tense — Will vs Going to','desc'=>'Both talk about the future, but native speakers choose between them based on a rule most textbooks skip.','tags'=>['future-simple'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Must, Have To & Should — What\'s the Real Difference','hindi'=>'Must, have to, should — fark samjho','desc'=>'Why "you must submit this" and "you have to submit this" aren\'t quite the same — and when should is the polite choice instead.','tags'=>['modals-obligation'],'status'=>'soon'],
      ['topic'=>'Speaking','title'=>'Would You Mind...? — Asking Politely in English','hindi'=>'Politely kaise poochein','desc'=>'"Could you..." vs "Would you mind..." vs "I was wondering if..." — the request ladder British speakers use without thinking about it.','tags'=>['polite-requests'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'If Sentences — Zero, First & Second Conditional','hindi'=>'If wale sentences — teen tarike','desc'=>'"If it rains, I stay home" vs "If it rained, I would stay home" — the difference that changes what you\'re actually saying.','tags'=>['conditionals'],'status'=>'live','link_slug'=>'if-sentences-zero-first-second-conditional'],
      ['topic'=>'Grammar','title'=>'Passive Voice — "The Report Was Submitted"','hindi'=>'Passive voice — kab aur kyun','desc'=>'When to hide who did the action — the structure every formal email and report quietly depends on.','tags'=>['passive-voice'],'status'=>'live','link_slug'=>'passive-voice-the-report-was-submitted'],
      ['topic'=>'Grammar','title'=>'In, At, On — Prepositions of Time & Place','hindi'=>'In/at/on — kab kaunsa use karein','desc'=>'"In the morning" but "at 9am" but "on Monday" — the rule Indian learners are usually never actually taught, only memorised.','tags'=>['prepositions-time-place'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'"I Enjoy Reading" or "I Enjoy to Read"?','hindi'=>'-ing ya to + verb — kaunsa sahi hai','desc'=>'Why "I look forward to see you" is wrong and "I look forward to seeing you" is right — the verb pattern most learners never notice.','tags'=>['gerunds-infinitives'],'status'=>'soon'],
    ],
    'cta_h' => 'New Intermediate lessons every week',
    'cta_p' => 'Real British English. No textbooks. No boring drills.',
    'cta_hi'=> 'Subscribe karo — bilkul free',
  ],

  'advanced' => [
    'label'   => 'Advanced',
    'icon'    => 'bolt',
    'fill'=>'#DDD6FF','mid'=>'#B8A8F8','deep'=>'#5520CC',
    'badge'   => 'Level 3 — Advanced',
    'hi'      => 'Fluency ki taraf',
    'desc'    => 'Your grammar is solid but you want to sound truly natural — like someone who has actually lived in Britain. Idioms, nuance, complex structures, and authentic British expression.',
    'cefr'    => 'C1–C2',
    'checklist' => [
      'Your grammar is good but your English sounds "too correct" — not natural',
      'You struggle with idioms, sarcasm, and British understatement',
      'You want to write with sophistication — essays, emails, reports',
      'You aim to pass IELTS 7+ or work in a British/international environment',
    ],
    'topics' => [
      ['slug'=>'idioms-expressions','label'=>'Idioms & Expressions'],
      ['slug'=>'subjunctive-mood','label'=>'Subjunctive Mood'],
      ['slug'=>'past-perfect','label'=>'Past Perfect'],
      ['slug'=>'past-perfect-continuous','label'=>'Past Perfect Continuous'],
      ['slug'=>'future-continuous','label'=>'Future Continuous'],
      ['slug'=>'future-perfect','label'=>'Future Perfect'],
      ['slug'=>'future-perfect-continuous','label'=>'Future Perfect Continuous'],
      ['slug'=>'advanced-writing','label'=>'Advanced Writing'],
      ['slug'=>'british-understatement','label'=>'British Understatement'],
      ['slug'=>'nuanced-vocabulary','label'=>'Nuanced Vocabulary'],
      ['slug'=>'complex-structures','label'=>'Complex Structures'],
      ['slug'=>'inversion','label'=>'Inversion'],
      ['slug'=>'academic-english','label'=>'Academic English'],
      ['slug'=>'relative-clauses','label'=>'Relative Clauses (Who, Which, That)'],
      ['slug'=>'wish-third-conditional','label'=>'Wish & Third Conditional'],
    ],
    'lessons' => [
      ['topic'=>'Idioms','title'=>"20 British Idioms You'll Hear Every Day",'hindi'=>'British idioms — real use','desc'=>'"It\'s not my cup of tea", "Bob\'s your uncle" — with context and when NOT to use them.','tags'=>['idioms-expressions'],'status'=>'soon'],
      ['topic'=>'Writing','title'=>'How to Write Sophisticated Emails in English','hindi'=>'Professional emails — advanced level','desc'=>'The difference between polite, formal, and sophisticated. Why "Please do the needful" makes British readers wince.','tags'=>['advanced-writing'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Subjunctive Mood — The Secret Grammar','hindi'=>'Subjunctive — jo textbook mein nahi tha','desc'=>'"If I were you" not "If I was you" — the subjunctive that separates advanced speakers from the rest.','tags'=>['subjunctive-mood'],'status'=>'soon'],
      ['topic'=>'Culture','title'=>'British Understatement — The Invisible Language','hindi'=>'British understatement ko samjho','desc'=>'When a British person says "not bad" they actually mean excellent. The cultural layer beneath the words.','tags'=>['british-understatement'],'status'=>'soon'],
      ['topic'=>'Pronunciation','title'=>'How to Stop Your Accent From Holding You Back','hindi'=>'Accent vs Pronunciation','desc'=>'Accent is not a problem — unclear pronunciation is. The specific sounds Indian speakers need to target.','tags'=>[],'status'=>'soon'],
      ['topic'=>'Vocabulary','title'=>'Synonyms That Change Your Register Instantly','hindi'=>'Word choice se register badalta hai','desc'=>'The difference between "use", "utilise", and "leverage" — and when each is actually appropriate.','tags'=>['nuanced-vocabulary'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Past Perfect — "I Had Already Left"','hindi'=>'Had + past participle','desc'=>'Showing which of two past actions happened first — the tense that makes storytelling precise.','tags'=>['past-perfect'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Past Perfect Continuous — The Rarely Taught Tense','hindi'=>'Had been + ing','desc'=>'Describing a continuous action that was happening before another past event, with natural spoken examples.','tags'=>['past-perfect-continuous'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Future Continuous — "I Will Be Working"','hindi'=>'Will be + ing','desc'=>'Talking about an action that will be in progress at a specific future time — sounds sophisticated when used correctly.','tags'=>['future-continuous'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Future Perfect — "I Will Have Finished"','hindi'=>'Will have + past participle','desc'=>'Describing an action that will be completed before a specific point in the future.','tags'=>['future-perfect'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Future Perfect Continuous — The Final Tense','hindi'=>'Will have been + ing','desc'=>'The most advanced tense in English — showing the duration of an action leading up to a future point.','tags'=>['future-perfect-continuous'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'Relative Clauses — Who, Which, That, Whose','hindi'=>'Relative clauses — sentence jodna seekho','desc'=>'"The man who called you" vs "The man, who I met yesterday, called you" — the comma that changes the meaning.','tags'=>['relative-clauses'],'status'=>'soon'],
      ['topic'=>'Grammar','title'=>'I Wish I Had Known — Third Conditional & Wish','hindi'=>'Wish aur third conditional','desc'=>'Regret about the past, done properly — "If I had known" and "I wish I had known," and why native speakers never mix them up.','tags'=>['wish-third-conditional'],'status'=>'soon'],
    ],
    'cta_h' => 'Advanced lessons — real British English, no filter',
    'cta_p' => 'The nuance, the culture, the language beneath the language.',
    'cta_hi'=> 'Advanced level — serious learners ke liye',
  ],

  'business' => [
    'label'   => 'Business English',
    'icon'    => 'briefcase',
    'fill'=>'#C8E8D4','mid'=>'#90CFA8','deep'=>'#1A5C38',
    'badge'   => 'Professional Level',
    'hi'      => 'Office ke liye — professional English',
    'desc'    => 'Built from 7 years of real experience in British workplaces. Emails, meetings, presentations, negotiations — the actual language used in London offices, not textbook examples.',
    'cefr'    => 'B2–C1',
    'checklist' => [
      'You work in an international company and want to sound more professional',
      'Your emails are grammatically correct but sound stiff or abrupt',
      'You want to present confidently in meetings with British or global teams',
      "You're preparing for a job abroad or working with British clients",
    ],
    'topics' => [
      ['slug'=>'professional-emails','label'=>'Professional Emails'],
      ['slug'=>'meeting-language','label'=>'Meeting Language'],
      ['slug'=>'presentations','label'=>'Presentations'],
      ['slug'=>'negotiation','label'=>'Negotiation'],
      ['slug'=>'small-talk','label'=>'Small Talk'],
      ['slug'=>'giving-feedback','label'=>'Giving Feedback'],
      ['slug'=>'telephone-english','label'=>'Telephone English'],
      ['slug'=>'report-writing','label'=>'Report Writing'],
    ],
    'lessons' => [
      ['topic'=>'Emails','title'=>'How to Write a Professional Email in British English','hindi'=>'Professional email kaise likhen','desc'=>'Subject lines, openers, closers, tone — the complete framework used in British companies.','tags'=>['professional-emails'],'status'=>'soon'],
      ['topic'=>'Meetings','title'=>'Meeting Phrases That Sound Confident, Not Aggressive','hindi'=>'Meeting mein confident bolo','desc'=>'"With respect...", "I take your point but..." — how to speak up without sounding rude.','tags'=>['meeting-language'],'status'=>'soon'],
      ['topic'=>'Small Talk','title'=>'British Small Talk — The Unwritten Rules','hindi'=>'Small talk — British style','desc'=>'Why British people talk about weather, what to say on Monday mornings, and how to build rapport naturally.','tags'=>['small-talk'],'status'=>'soon'],
      ['topic'=>'Vocabulary','title'=>"20 Business Phrases You'll Hear in Every UK Office",'hindi'=>'UK office ke 20 phrases','desc'=>'"Circle back", "deep dive", "move the needle" — with context and when they\'ve become cliches.','tags'=>['meeting-language'],'status'=>'soon'],
      ['topic'=>'Presentations','title'=>'How to Structure a Confident Presentation','hindi'=>'Presentation kaise den','desc'=>'The PREP framework, signposting language, handling questions — the complete guide to presenting in English.','tags'=>['presentations'],'status'=>'soon'],
      ['topic'=>'Telephone','title'=>'Telephone & Video Call English That Sounds Natural','hindi'=>'Call par professional English','desc'=>'Opening calls, handling poor connections, summarising action points — phrases that make calls run smoothly.','tags'=>['telephone-english'],'status'=>'soon'],
    ],
    'cta_h' => '7 years of British workplace experience — free',
    'cta_p' => 'Everything I learned in London offices, translated into lessons for you.',
    'cta_hi'=> 'Real experience — real lessons — real results',
  ],

];

/* Compute topic counts server-side so pill counts are always accurate.
   A pill becomes a direct link straight to the lesson ONLY when exactly
   one LIVE (published, linkable) lesson carries that tag — "soon"
   placeholders don't count toward this, so a topic quietly stops being
   a direct link the moment a second real lesson goes live under it,
   without needing another manual pass through this file. */
foreach ($levels as $key => &$lvl) {
  foreach ($lvl['topics'] as &$t) {
    $t['count'] = 0;
    $live_matches = [];
    foreach ($lvl['lessons'] as $ls) {
      if (!in_array($t['slug'], $ls['tags'], true)) continue;
      $t['count']++;
      if (($ls['status'] ?? '') === 'live' && !empty($ls['link_slug'])) {
        $live_matches[] = $ls['link_slug'];
      }
    }
    $t['direct_link'] = (count($live_matches) === 1) ? me_lesson_url($live_matches[0]) : null;
  }
  unset($t);
}
unset($lvl);

/* ══════════════════════════════════════════════════════════
   TENSE MATRIX — all 12 English tenses, mapped to the level
   and topic slug that teaches them. Powers the "Master Every
   Tense" quick-access grid so nobody has to hunt for a tense.
   ══════════════════════════════════════════════════════════ */
$tense_matrix = [
  'Simple' => [
    'Present' => ['label'=>'Present Simple','example'=>'I work','level'=>'beginner','slug'=>'simple-present','link_slug'=>'the-present-simple-tense-habits-facts-daily-life'],
    'Past'    => ['label'=>'Past Simple','example'=>'I worked','level'=>'beginner','slug'=>'simple-past'],
    'Future'  => ['label'=>'Future Simple','example'=>'I will work','level'=>'intermediate','slug'=>'future-simple'],
  ],
  'Continuous' => [
    'Present' => ['label'=>'Present Continuous','example'=>'I am working','level'=>'beginner','slug'=>'present-continuous'],
    'Past'    => ['label'=>'Past Continuous','example'=>'I was working','level'=>'intermediate','slug'=>'past-continuous'],
    'Future'  => ['label'=>'Future Continuous','example'=>'I will be working','level'=>'advanced','slug'=>'future-continuous'],
  ],
  'Perfect' => [
    'Present' => ['label'=>'Present Perfect','example'=>'I have worked','level'=>'intermediate','slug'=>'perfect-tenses'],
    'Past'    => ['label'=>'Past Perfect','example'=>'I had worked','level'=>'advanced','slug'=>'past-perfect'],
    'Future'  => ['label'=>'Future Perfect','example'=>'I will have worked','level'=>'advanced','slug'=>'future-perfect'],
  ],
  'Perfect Continuous' => [
    'Present' => ['label'=>'Present Perfect Continuous','example'=>'I have been working','level'=>'intermediate','slug'=>'present-perfect-continuous'],
    'Past'    => ['label'=>'Past Perfect Continuous','example'=>'I had been working','level'=>'advanced','slug'=>'past-perfect-continuous'],
    'Future'  => ['label'=>'Future Perfect Continuous','example'=>'I will have been working','level'=>'advanced','slug'=>'future-perfect-continuous'],
  ],
];
$tense_level_dot = ['beginner'=>'#1A5C96','intermediate'=>'#B04020','advanced'=>'#5520CC','business'=>'#1A5C38'];
$tense_level_label = ['beginner'=>'Beginner','intermediate'=>'Intermediate','advanced'=>'Advanced','business'=>'Business'];

/* Level icon SVGs — same icon language as the homepage level cards */
function me_level_icon($name, $color = '#fff', $size = 28) {
  $icons = [
    'book' => '<path d="M14 6v20M14 6C14 6 8 3.6 2 6v18c6-2.2 12 0 12 0M14 6c0 0 6-2.4 12 0v18c-6-2.2-12 0-12 0" stroke="'.$color.'" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>',
    'bubbles' => '<path d="M4 9a3 3 0 013-3h10a3 3 0 013 3v7a3 3 0 01-3 3h-2l-3 3-3-3H7a3 3 0 01-3-3V9z" stroke="'.$color.'" stroke-width="2.2" stroke-linejoin="round"/><path d="M15 16.5v.5a3 3 0 003 3h1l3 3 3-3h.5a3 3 0 003-3v-5a3 3 0 00-3-3h-5.4" stroke="'.$color.'" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>',
    'bolt' => '<path d="M16 3L6 16h9l-3 9 12-16h-9l1-6z" fill="'.$color.'"/>',
    'briefcase' => '<rect x="4" y="12" width="20" height="13" rx="2.5" stroke="'.$color.'" stroke-width="2.2"/><path d="M10.5 12v-2.5A3.5 3.5 0 0114 6h0a3.5 3.5 0 013.5 3.5V12" stroke="'.$color.'" stroke-width="2.2" stroke-linecap="round"/><line x1="4" y1="18" x2="24" y2="18" stroke="'.$color.'" stroke-width="2.2"/><circle cx="14" cy="18" r="1.6" fill="'.$color.'"/>',
  ];
  return '<svg width="'.$size.'" height="'.$size.'" viewBox="0 0 28 28" fill="none">'.($icons[$name] ?? '').'</svg>';
}

/* Resolve a real grammar_lesson permalink from its slug.
   This always points at the actual published URL — never a guessed one —
   so "Read Lesson" links stay correct even if permalinks change.
   Returns '' if no matching published lesson is found yet. */
function me_lesson_url($slug) {
  if (empty($slug)) return '';
  $post = get_page_by_path($slug, OBJECT, 'grammar_lesson');
  return $post ? get_permalink($post->ID) : '';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Choose Your Level &mdash; Maninder English</title>
<?php wp_head(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');
:root{
  --cream:#F7F4EE;--white:#FFFFFF;--navy:#1A2540;--muted:#4A5568;--border:#E8E4DC;
  --violet:#6633DD;--vm:#8B6CF6;--vl:#EDE8FB;--saffron:#C97A10;--sfdeep:#B5470F;
  /* ── Brand level colours — exact match to homepage level cards ── */
  --lb-fill:#C8E4F8;--lb-mid:#93C8EF;--lb-deep:#1A5C96;
  --li-fill:#FAD5CF;--li-mid:#F4A89E;--li-deep:#B04020;
  --la-fill:#DDD6FF;--la-mid:#B8A8F8;--la-deep:#5520CC;
  --lg-fill:#C8E8D4;--lg-mid:#90CFA8;--lg-deep:#1A5C38;
  --d:'Plus Jakarta Sans',sans-serif;--b:'Inter',sans-serif;--h:'Noto Sans Devanagari',sans-serif;
  --e2:cubic-bezier(.4,0,.2,1);--e3:cubic-bezier(.22,1,.36,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:var(--b);background:#fff;color:#111;-webkit-font-smoothing:antialiased;overflow-x:hidden;line-height:1.65}
a{text-decoration:none;color:inherit}
h1,h2,h3,h4{font-family:var(--d);line-height:1.1;letter-spacing:-.025em;color:#111}
p{color:var(--muted);line-height:1.72}
.wrap{width:100%;max-width:1160px;margin:0 auto;padding:0 36px}

#spb{position:fixed;top:0;left:0;height:3px;width:0;z-index:9999;background:linear-gradient(90deg,var(--violet),var(--vm));transition:width .07s linear}

.reveal{opacity:0;transform:translateY(14px);transition:opacity .4s var(--e2),transform .4s var(--e2)}
.reveal.in{opacity:1;transform:none}
.reveal-left{opacity:0;transform:translateX(-14px);transition:opacity .4s var(--e2),transform .4s var(--e2)}
.reveal-left.in{opacity:1;transform:none}
.reveal-scale{opacity:0;transform:translateY(10px) scale(.985);transition:opacity .38s var(--e2),transform .38s var(--e2)}
.reveal-scale.in{opacity:1;transform:none}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}
@keyframes badgePop{0%{transform:scale(.82);opacity:0}70%{transform:scale(1.05)}100%{transform:scale(1);opacity:1}}
.fade-in{animation:fadeUp .5s var(--e3) both}

/* NAV */
.me-nav{position:sticky;top:0;z-index:400;background:rgba(255,255,255,.97);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);transition:box-shadow .28s}
.me-nav.scrolled{box-shadow:0 2px 20px rgba(26,37,64,.09)}
.me-nav-wrap{display:flex;align-items:center;height:68px;max-width:1160px;margin:0 auto;padding:0 36px}
.me-logo{font-family:var(--d);font-weight:800;font-size:21px;letter-spacing:-.035em;color:var(--navy);flex-shrink:0;margin-right:auto}
.me-logo em{font-style:normal;color:var(--violet)}
.me-nav-links{display:flex;align-items:center;gap:2px;list-style:none}
.me-nav-links a{font-size:14px;font-weight:500;color:var(--muted);padding:8px 14px;border-radius:8px;display:block;transition:color .18s,background .18s}
.me-nav-links a:hover{color:var(--navy);background:var(--cream)}
.me-nav-links a.active{color:var(--violet);font-weight:600}
.me-nav-right{display:flex;align-items:center;gap:10px;flex-shrink:0;margin-left:18px}
.btn-yt{display:inline-flex;align-items:center;gap:6px;background:#FF0000;color:#fff;font-family:var(--d);font-weight:700;font-size:13px;padding:9px 18px;border-radius:9px;border:none;cursor:pointer;transition:transform .2s,box-shadow .2s;white-space:nowrap}
.btn-yt:hover{background:#cc0000;transform:translateY(-2px);box-shadow:0 8px 24px rgba(255,0,0,.28)}
.me-hamburger{display:none;background:none;border:none;font-size:22px;color:var(--navy);cursor:pointer}

/* HERO */
.levels-hero{background:#fff;padding:60px 0 44px;border-bottom:2px solid var(--border)}
.lh-eye{display:inline-block;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--violet);background:var(--vl);padding:5px 14px;border-radius:50px;margin-bottom:16px;animation:badgePop .6s .1s both}
.levels-hero h1{font-size:clamp(38px,5vw,60px);font-weight:800;margin-bottom:14px}
.levels-hero h1 em{font-style:normal;color:var(--violet)}
.lh-hi{font-family:var(--h);font-size:19px;font-weight:700;color:var(--sfdeep);border-left:4px solid var(--sfdeep);padding-left:14px;margin-bottom:18px;display:block;line-height:1.5}
.levels-hero p{font-size:18px;max-width:640px;color:var(--muted);margin-bottom:32px}

/* Hero quick-nav — 4 mini layered badges, jump + switch tab */

/* TENSE MATRIX — "Master Every Tense" quick-access grid */
.tense-section{background:var(--cream);padding:56px 0;border-bottom:2px solid var(--border)}
.tense-head{max-width:640px;margin-bottom:32px}
.tense-eye{display:inline-block;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--navy);background:#fff;border:1px solid var(--border);padding:5px 14px;border-radius:50px;margin-bottom:14px}
.reveal.in .tense-eye{animation:badgePop .6s .05s both}
.tense-head h2{font-size:clamp(26px,3.2vw,34px);font-weight:800;margin-bottom:8px}
.tense-head h2 em{font-style:normal;color:var(--violet)}
.tense-head p{font-size:15.5px;color:var(--muted);max-width:560px}
.tm-grid{display:flex;flex-direction:column;gap:10px}
.tm-colheads{display:grid;grid-template-columns:150px repeat(3,1fr);gap:10px}
.tm-colhead{font-family:var(--d);font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#8a8578;display:flex;align-items:center;padding:0 4px 2px}
.tm-row{display:grid;grid-template-columns:150px repeat(3,1fr);gap:10px}
.tm-rowlabel{font-family:var(--d);font-size:15px;font-weight:800;color:var(--navy);display:flex;align-items:center;padding:0 12px}
.tm-cell{background:linear-gradient(160deg,#fff 0%,color-mix(in srgb, var(--cell-tint) 12%, #fff) 100%);border:1.5px solid var(--border);border-radius:16px;padding:20px 20px 18px;cursor:pointer;position:relative;overflow:hidden;
  transition:transform .25s var(--e3),border-color .25s,box-shadow .3s var(--e3),background .3s;display:flex;flex-direction:column;gap:8px}
.tm-cell::after{content:'→';position:absolute;top:16px;right:18px;font-size:17px;font-weight:800;color:var(--cell-tint);opacity:0;transform:translateX(-6px);transition:opacity .25s ease,transform .25s var(--e3)}
.tm-cell:hover{transform:translateY(-5px) scale(1.015);border-color:var(--cell-tint);box-shadow:0 16px 32px -10px color-mix(in srgb, var(--cell-tint) 45%, transparent)}
.tm-cell:hover::after{opacity:1;transform:translateX(0)}
.tm-cell:active{transform:translateY(-2px) scale(.99)}
.tm-cell-top{display:flex;align-items:center;gap:8px}
.tm-cell-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;box-shadow:0 0 0 3px color-mix(in srgb, var(--cell-tint) 20%, transparent);transition:box-shadow .25s}
.tm-cell:hover .tm-cell-dot{box-shadow:0 0 0 5px color-mix(in srgb, var(--cell-tint) 28%, transparent)}
.tm-cell-level{font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.07em;color:#8a8578}
.tm-cell-label{font-family:var(--d);font-size:18px;font-weight:800;color:#111;line-height:1.22;padding-right:18px;letter-spacing:-.01em}
.tm-cell-ex{font-family:var(--h);font-size:14.5px;color:#6b6658;font-style:italic;font-weight:600}

/* Accordion wrapper — inert on desktop, collapses each tense-family on mobile */
.tm-details{display:block}
.tm-details > summary{list-style:none;cursor:pointer}
.tm-details > summary::-webkit-details-marker{display:none}
.tm-summary{display:none}
@media(max-width:768px){
  .tense-section{padding:40px 0}
  .tm-colheads{display:none}
  .tm-grid{gap:12px}
  .tm-details{border:1.5px solid var(--border);border-radius:14px;background:#fff;overflow:hidden;transition:border-color .25s}
  .tm-details[open]{border-color:color-mix(in srgb, var(--violet) 30%, var(--border))}
  .tm-summary{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:14px 16px}
  .tm-summary-label{font-family:var(--d);font-size:15px;font-weight:800;color:var(--navy)}
  .tm-summary-meta{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#8a8578}
  .tm-chevron{width:9px;height:9px;border-right:2px solid #8a8578;border-bottom:2px solid #8a8578;transform:rotate(45deg);transition:transform .25s var(--e3)}
  .tm-details[open] .tm-chevron{transform:rotate(-135deg)}
  .tm-rowlabel{display:none}
  .tm-row{grid-template-columns:1fr;gap:10px;padding:0 14px 14px}
  .tm-cell{padding:18px 20px}
  .tm-cell-label{font-size:19px}
  .tm-cell-ex{font-size:15px}
  .tm-cell-level{font-size:11.5px}
}


/* LEVEL PICKER — single icon-pill selector (replaces old dot-underline tabs) */
.level-tabs-wrap{background:#fff;border-bottom:2px solid var(--border);position:sticky;top:68px;z-index:300;padding:18px 0}
.level-tabs{display:flex;flex-wrap:wrap;gap:14px;max-width:1160px;margin:0 auto;padding:0 36px}
.ltab{display:flex;align-items:center;gap:11px;padding:9px 22px 9px 9px;border-radius:50px;border:2px solid var(--border);background:#fff;cursor:pointer;font-family:var(--d);font-size:15px;font-weight:700;color:var(--navy);transition:transform .3s var(--e3),border-color .3s ease,box-shadow .3s ease}
.ltab-icon{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:var(--pc,#6633DD);transition:transform .3s var(--e3)}
.ltab:hover{transform:translateY(-3px);box-shadow:0 12px 26px rgba(0,0,0,.09)}
.ltab.on{border-color:var(--pc,#6633DD);box-shadow:0 8px 20px rgba(0,0,0,.10)}
.ltab.on .ltab-icon{transform:scale(1.08)}

@media(max-width:600px){
  .level-tabs-wrap{border-bottom:none;padding:14px 16px 14px;background:#F4F2EE;position:sticky;top:62px}
  .level-tabs{display:grid;grid-template-columns:1fr 1fr;gap:10px;padding:0;max-width:100%}
  .ltab{font-size:13.5px;padding:9px 12px 9px 9px;justify-content:center}
  .ltab-icon{width:26px;height:26px}
}

.level-section{display:none}
.level-section.active{display:block}

/* BANNER */
.ls-banner{background:#fff;padding:72px 0 68px;border-bottom:1px solid var(--border);position:relative}
.ls-banner::before{content:'';position:absolute;left:0;top:0;right:0;height:4px}
.ls-banner-inner{display:grid;grid-template-columns:1.25fr 1fr;gap:60px;align-items:start}
.lv-badge{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;padding:6px 16px 6px 6px;border-radius:50px;color:#fff;margin-bottom:28px}
.reveal-left.in .lv-badge{animation:badgePop .55s .05s both}
.lv-badge .badge-dot{width:22px;height:22px;border-radius:50%;background:rgba(255,255,255,.22);display:flex;align-items:center;justify-content:center}
.ls-banner h2{font-family:var(--d);font-size:clamp(52px,5.6vw,76px);font-weight:800;color:#111;margin-bottom:10px;letter-spacing:-.04em;line-height:.95}
.ls-hi{font-family:var(--h);font-size:18px;font-weight:700;display:block;margin-bottom:24px;padding-left:14px;border-left:3px solid;line-height:1.5;margin-top:4px}
.ls-desc{font-size:17px;color:#4a4a4a;max-width:480px;line-height:1.78;margin-bottom:40px}
.lsb-stats{display:flex;gap:0;border-top:1px solid var(--border);padding-top:28px}
.lsbs{flex:1}
.lsbs+.lsbs{padding-left:28px;border-left:1px solid var(--border)}
.lsbs .n{font-family:var(--d);font-size:34px;font-weight:800;color:#111;line-height:1}
.lsbs .l{font-size:12px;color:#777;margin-top:6px;font-weight:500;text-transform:uppercase;letter-spacing:.08em}

/* Checklist card — with big layered level icon at top */
.lsb-card{border-radius:24px;padding:32px;border:none;box-shadow:none;margin-top:0;position:relative;overflow:hidden}
.lsb-icon-stage{position:relative;width:80px;height:66px;margin-bottom:26px}
.lsb-layer-back{position:absolute;width:52px;height:52px;border-radius:16px;top:8px;left:0;transform:rotate(-8deg);box-shadow:0 8px 18px rgba(0,0,0,.16);transition:transform .5s var(--e3)}
.lsb-layer-front{position:absolute;width:58px;height:58px;border-radius:18px;top:0;left:22px;display:flex;align-items:center;justify-content:center;transform:rotate(5deg);box-shadow:0 12px 28px rgba(0,0,0,.22),0 3px 8px rgba(0,0,0,.12);transition:transform .5s var(--e3)}
.lsb-card:hover .lsb-layer-back{transform:rotate(-14deg) translateY(4px)}
.lsb-card:hover .lsb-layer-front{transform:rotate(9deg) translateY(-6px)}
.lsb-card h4{font-family:var(--d);font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.12em;color:#777;margin-bottom:20px}
.lsb-check{display:flex;align-items:flex-start;gap:12px;margin-bottom:14px}
.lsb-check:last-child{margin:0}
.lsb-ck{width:22px;height:22px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:#fff;flex-shrink:0;margin-top:1px}
.lsb-check p{font-size:15px;color:#222;margin:0;line-height:1.55;font-weight:500}

/* TOPICS — functional filter pills, one consistent near-black treatment on a clean white section */
.ls-topics{background:#fff;padding:28px 0;border-bottom:1px solid var(--border);border-top:1px solid var(--border)}
.ls-topics-inner{display:flex;align-items:center;gap:11px;flex-wrap:wrap}
.ls-topics-label{font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:#9a9585;flex-shrink:0;margin-right:4px}
.tp{font-size:13.5px;font-weight:800;padding:9px 18px;border-radius:50px;flex-shrink:0;border:1.5px solid #221F1A;cursor:pointer;
  letter-spacing:.01em;
  transition:transform .22s var(--e3),background .22s ease,color .22s ease,border-color .22s ease,box-shadow .22s ease;
  user-select:none;display:inline-flex;align-items:center;gap:8px;position:relative;
  background:#221F1A;
  color:#FFFFFF;
  box-shadow:0 3px 10px rgba(20,18,14,.16);}
.tp:hover{transform:translateY(-4px) scale(1.04);background:#fff;color:#221F1A;border-color:#221F1A;box-shadow:0 16px 30px -8px rgba(0,0,0,.28)}
.tp:hover .tp-dot{background:#221F1A;box-shadow:0 0 0 3px rgba(34,31,26,.14)}
.tp:hover .tp-count{color:#221F1A}
.tp-dot{width:6px;height:6px;border-radius:50%;flex-shrink:0;background:#fff;box-shadow:0 0 0 3px rgba(255,255,255,.22)}
.tp .tp-count{opacity:.72;font-weight:800;margin-left:1px;font-variant-numeric:tabular-nums;color:#fff}
.tp-all{font-weight:800;background:#000;color:#fff;border-color:#000;box-shadow:0 3px 10px rgba(20,18,14,.22)}
.tp-all:hover{background:#000;border-color:#000}
.tp.on{background:#000;color:#fff;border-color:#000;box-shadow:0 14px 28px -8px rgba(0,0,0,.55)}
.tp.on .tp-dot{background:#fff!important;box-shadow:0 0 0 3px rgba(255,255,255,.32)}

/* LESSON GRID */
.ls-lessons{padding:60px 0;background:#FAFAFA}
.ls-lessons-header{display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:16px;margin-bottom:20px}
.ls-lessons-header h3{font-size:clamp(28px,3.2vw,38px);font-weight:800;color:#111}
.ls-lessons-header p{font-size:16px;color:#666;margin-top:6px}
.ls-filter-status{display:flex;align-items:center;gap:10px;margin-bottom:32px;min-height:28px}
.ls-filter-status.hidden{display:none}
.ls-filter-text{font-size:14px;color:#555;font-weight:600}
.ls-filter-clear{font-size:12.5px;font-weight:700;color:var(--violet);background:var(--vl);padding:5px 13px;border-radius:50px;cursor:pointer;border:none;transition:background .2s ease}
.ls-filter-clear:hover{background:#DDD3F8}

.lesson-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;transition:opacity .22s ease}
.lesson-grid.filtering{opacity:.35}
.lesson-card{background:#fff;border:1.5px solid var(--border);border-radius:20px;overflow:hidden;position:relative;
  transition:transform .12s ease-out,box-shadow .4s var(--e3),border-color .3s ease,opacity .35s var(--e3);
  box-shadow:0 2px 10px rgba(26,37,64,.05);will-change:transform}
.lesson-card:hover{box-shadow:0 22px 52px rgba(26,37,64,.14)}
.lesson-card.lc-hidden{display:none}
.lesson-card::after{content:'';position:absolute;inset:0;background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.35) 45%,transparent 60%);transform:translateX(-120%);transition:transform .7s var(--e3);pointer-events:none;z-index:3}
.lesson-card:hover::after{transform:translateX(120%)}
.lc-bar{height:4px;width:100%}
.lc-thumb{aspect-ratio:16/9;position:relative;overflow:hidden;cursor:pointer}
.lc-inner{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px}
.lc-inner::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.10) 1.5px,transparent 1.5px);background-size:20px 20px;opacity:.6}
.lc-watermark{position:absolute;bottom:-14px;right:-10px;opacity:.13;transform:rotate(-8deg);transition:transform .5s var(--e3),opacity .5s ease}
.lesson-card:hover .lc-watermark{transform:rotate(-4deg) scale(1.06);opacity:.19}
.lc-play{width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.18);border:2px solid rgba(255,255,255,.32);display:flex;align-items:center;justify-content:center;font-size:19px;color:#fff;transition:background .2s,transform .2s;position:relative;z-index:2}
.lesson-card:hover .lc-play{background:rgba(255,255,255,.28);transform:scale(1.1)}
.lc-coming{font-size:11px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:rgba(255,255,255,.62);background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);padding:4px 12px;border-radius:50px;position:relative;z-index:2}
.lc-num{position:absolute;top:12px;left:14px;font-family:var(--d);font-size:13px;font-weight:800;color:rgba(255,255,255,.45);z-index:2}
.lc-body{padding:24px 24px 0;position:relative;z-index:2}
.lc-topic{font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;margin-bottom:10px}
.lc-body h4{font-size:20px;font-weight:700;color:#111;margin-bottom:7px;line-height:1.25}
.lc-hindi{font-family:var(--h);font-size:14px;font-weight:700;display:block;margin-bottom:12px}
.lc-body p{font-size:15px;color:#555;line-height:1.68}
.lc-footer{padding:16px 24px 20px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;margin-top:18px;gap:8px;position:relative;z-index:2}
.lc-read-live{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:800;color:#fff;background:#16A34A;padding:5px 10px;border-radius:8px;text-decoration:none;transition:background .2s}
.lc-read-live:hover{background:#15803D}
.lc-read-soon{font-size:11px;font-weight:600;color:#bbb}
.lc-yt{font-size:12px;font-weight:700;color:#FF0000;display:flex;align-items:center;gap:4px;padding:5px 10px;border:1.5px solid #FECACA;border-radius:8px;transition:background .2s}
.lc-yt:hover{background:#FEF2F2}

/* Written-lesson header — replaces the fake video thumbnail when a lesson has real written content but no video yet */
.lc-thumb-written{aspect-ratio:16/9;position:relative;overflow:hidden;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px}
.lc-thumb-written .lc-watermark-sm{opacity:.9}
.lc-readtime{font-size:11px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;padding:5px 13px;border-radius:50px;background:rgba(255,255,255,.7);position:relative;z-index:2}

/* Coming-soon thumbnail — solid neutral dark, no play button, doesn't promise a video that isn't there */
.lc-thumb-soon .lc-inner{background:linear-gradient(145deg,#1C1F26 0%,#2E323C 100%) !important}
.lc-thumb-soon .lc-watermark{opacity:.08}
.lc-thumb-soon .lc-coming{color:rgba(255,255,255,.7);background:rgba(255,255,255,.06)}
.lc-thumb-soon .lc-play{display:none}


/* Empty state — shown when a filter matches zero lessons */
.ls-empty{display:none;text-align:center;padding:64px 24px;border:2px dashed var(--border);border-radius:20px;background:#fff}
.ls-empty.show{display:block}
.ls-empty-icon{font-size:32px;margin-bottom:14px}
.ls-empty h4{font-size:19px;margin-bottom:8px;color:#333}
.ls-empty p{font-size:14.5px;color:#888}

/* CTA BANNER — dark neutral gradient, same family as homepage YouTube CTA (never level-tinted) */
.cs-banner{border-radius:22px;padding:44px 52px;display:flex;align-items:center;justify-content:space-between;gap:28px;margin-top:48px;border:none;position:relative;overflow:hidden;background:linear-gradient(135deg,#1A0F3D 0%,#2D1B69 100%);box-shadow:0 16px 40px rgba(26,15,61,.28)}
.cs-banner::before{content:'';position:absolute;top:-40%;right:-8%;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(255,0,0,.16),transparent 70%);pointer-events:none}
.cs-banner h3{font-size:24px;font-weight:800;color:#fff;margin-bottom:7px;position:relative;z-index:2}
.cs-banner>div>p{font-size:16px;color:rgba(255,255,255,.68);position:relative;z-index:2}
.cs-hi{font-family:var(--h);font-size:14px;font-weight:700;display:block;margin-top:7px;color:#FDBA74;position:relative;z-index:2}
.cs-btns{display:flex;gap:12px;flex-wrap:wrap;flex-shrink:0;position:relative;z-index:2}
.btn-solid{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;cursor:pointer;transition:transform .2s,box-shadow .2s;white-space:nowrap;border:none;color:#fff}
.btn-solid:hover{transform:translateY(-2px)}
.btn-solid.btn-yt-solid{background:#FF0000;box-shadow:0 8px 22px rgba(255,0,0,.28)}
.btn-solid.btn-yt-solid:hover{background:#cc0000;box-shadow:0 10px 28px rgba(255,0,0,.35)}
.btn-outline-dk{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;cursor:pointer;border:2px solid var(--border);background:#fff;color:var(--navy);transition:transform .2s,border-color .2s}
.btn-outline-dk:hover{border-color:var(--navy);transform:translateY(-2px)}
.btn-outline-lt{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;cursor:pointer;border:2px solid rgba(255,255,255,.25);background:rgba(255,255,255,.06);color:#fff;transition:transform .2s,border-color .2s,background .2s}
.btn-outline-lt:hover{border-color:rgba(255,255,255,.55);background:rgba(255,255,255,.12);transform:translateY(-2px)}

/* FOOTER */
footer.me-footer{background:var(--navy);padding:56px 0 0}
.foot-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:40px;padding-bottom:40px;border-bottom:1px solid rgba(255,255,255,.08);margin-bottom:24px}
.foot-logo{font-family:var(--d);font-size:20px;font-weight:800;color:#fff;margin-bottom:9px;display:block;letter-spacing:-.025em}
.foot-logo em{font-style:normal;color:var(--vm)}
.foot-hi{font-family:var(--h);font-size:13px;color:rgba(201,122,16,.78);margin-bottom:11px}
.foot-desc{font-size:13px;line-height:1.72;max-width:260px;color:rgba(255,255,255,.5)}
.foot-col h4{font-family:var(--d);font-size:13px;font-weight:700;color:#fff;margin-bottom:16px}
.foot-col ul{list-style:none}
.foot-col li{margin-bottom:10px}
.foot-col a{font-size:13px;color:rgba(255,255,255,.55);transition:color .18s}
.foot-col a:hover{color:#fff}
.foot-bottom{display:flex;align-items:center;justify-content:space-between;padding-bottom:24px;flex-wrap:wrap;gap:14px}
.foot-copy{font-size:12px;color:rgba(255,255,255,.4)}
.me-socials{display:flex;gap:9px}
.me-soc{width:36px;height:36px;border-radius:9px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;transition:background .2s,transform .2s}
.me-soc:hover{background:var(--violet);transform:translateY(-2px)}
.me-soc svg{width:16px;height:16px;fill:#fff}

/* RESPONSIVE */
@media(max-width:1040px){.ls-banner-inner{grid-template-columns:1fr}.lesson-grid{grid-template-columns:repeat(2,1fr)}.foot-grid{grid-template-columns:1fr 1fr}.cs-banner{flex-direction:column}}
@media(max-width:768px){.me-nav-links{display:none}.me-hamburger{display:block}.lesson-grid{grid-template-columns:1fr}.wrap{padding:0 20px}.lc-body h4{font-size:18px}.foot-grid{grid-template-columns:1fr}.ls-banner{padding:48px 0 44px}.ls-banner h2{font-size:clamp(48px,12vw,68px)}.lsb-card{margin-top:32px}.cs-banner{padding:28px 24px}.cs-btns{flex-direction:column}.ls-lessons-header{flex-direction:column;align-items:flex-start}}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}}
</style>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/levels-premium.css' ); ?>?ver=<?php echo esc_attr( file_exists( get_stylesheet_directory() . '/assets/levels-premium.css' ) ? filemtime( get_stylesheet_directory() . '/assets/levels-premium.css' ) : '1.0.0' ); ?>">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="spb" aria-hidden="true"></div>

<!-- NAV -->
<nav class="me-nav" id="me-nav">
  <div class="me-nav-wrap">
    <a href="<?php echo home_url('/'); ?>" class="me-logo">Maninder<em>English</em></a>
    <ul class="me-nav-links" id="me-nav-links">
      <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
      <li><a href="<?php echo home_url('/levels/'); ?>" class="active">Levels</a></li>
 
      <li><a href="<?php echo home_url('/grammar/'); ?>">Grammar</a></li>
      <li><a href="<?php echo home_url('/vocabulary/'); ?>">Vocabulary</a></li>
      <li><a href="<?php echo home_url('/quizzes/'); ?>">Quizzes</a></li>
      <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
    </ul>
    <div class="me-nav-right">
      <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="btn-yt">&#9654; YouTube</a>
      <button class="me-hamburger" id="me-hamburger">&#9776;</button>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="levels-hero">
  <div class="wrap fade-in">
    <span class="lh-eye">Start Here</span>
    <h1>Choose Your <em>Level</em></h1>
    <span class="lh-hi">अपना level जानो — सही जगह से शुरू करो</span>
    <p>Every level is built differently — different vocabulary, different grammar challenges, different psychology. Pick your level and get exactly what you need, explained in Hindi and English.</p>
  </div>
</section>

<!-- TABS -->
<div class="level-tabs-wrap" role="tablist">
  <div class="level-tabs" id="level-tabs">
    <?php $first = true; foreach ($levels as $key => $lvl): ?>
    <button class="ltab <?php echo $first ? 'on' : ''; ?>" data-level="<?php echo esc_attr($key); ?>" data-color="<?php echo esc_attr($lvl['deep']); ?>" style="--pc:<?php echo esc_attr($lvl['deep']); ?>" onclick="switchLevel('<?php echo esc_js($key); ?>',this)" role="tab">
      <span class="ltab-icon" style="background:<?php echo esc_attr($lvl['deep']); ?>"><?php echo me_level_icon($lvl['icon'], '#fff', 16); ?></span>
      <?php echo esc_html($lvl['label']); ?>
    </button>
    <?php $first = false; endforeach; ?>
  </div>
</div>

<?php foreach ($levels as $key => $lvl):
  $active = ($key === array_key_first($levels)) ? ' active' : '';
?>
<!-- ═══════════════ <?php echo strtoupper($key); ?> ═══════════════ -->
<div class="level-section<?php echo $active; ?>" id="sec-<?php echo esc_attr($key); ?>" role="tabpanel">

  <div class="ls-banner" style="--bar-color:<?php echo esc_attr($lvl['deep']); ?>">
    <div class="wrap">
      <div class="ls-banner-inner">
        <div class="reveal-left">
          <div class="lv-badge" style="background:<?php echo esc_attr($lvl['deep']); ?>">
            <span class="badge-dot"><?php echo me_level_icon($lvl['icon'], '#fff', 13); ?></span><?php echo esc_html($lvl['badge']); ?>
          </div>
          <h2><?php echo esc_html($lvl['label']); ?></h2>
          <span class="ls-hi" style="color:<?php echo esc_attr($lvl['deep']); ?>;border-color:<?php echo esc_attr($lvl['deep']); ?>"><?php echo esc_html($lvl['hi']); ?></span>
          <p class="ls-desc"><?php echo esc_html($lvl['desc']); ?></p>
          <div class="lsb-stats">
            <div class="lsbs"><div class="n cnt" data-c="<?php echo count($lvl['lessons']); ?>">0</div><div class="l">Lessons planned</div></div>
            <div class="lsbs"><div class="n"><?php echo esc_html($lvl['cefr']); ?></div><div class="l">CEFR level</div></div>
            <div class="lsbs"><div class="n">Free</div><div class="l">Always</div></div>
          </div>
        </div>
        <div class="lsb-card reveal" style="background:<?php echo esc_attr($lvl['fill']); ?>">
          <div class="lsb-icon-stage">
            <div class="lsb-layer-back" style="background:<?php echo esc_attr($lvl['mid']); ?>"></div>
            <div class="lsb-layer-front" style="background:<?php echo esc_attr($lvl['deep']); ?>"><?php echo me_level_icon($lvl['icon'], '#fff', 26); ?></div>
          </div>
          <h4>This level is for you if&hellip;</h4>
          <?php foreach ($lvl['checklist'] as $c): ?>
          <div class="lsb-check"><div class="lsb-ck" style="background:<?php echo esc_attr($lvl['deep']); ?>">&#10003;</div><p><?php echo esc_html($c); ?></p></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <?php if ($key === 'beginner'): ?>
  <!-- MASTER EVERY TENSE — quick-access grid, Beginner-only since this is where every tense is first introduced -->
  <section class="tense-section">
    <div class="wrap">
      <div class="tense-head reveal">
        <span class="tense-eye">Grammar Map</span>
        <h2>All 12 English <em>Tenses</em>, One Tap Away</h2>
        <p>Every tense lives inside the level built for it. Tap any tense below and you'll land straight on that lesson — no searching, no wasted time.</p>
      </div>
      <div class="tm-grid">
        <div class="tm-colheads">
          <span></span>
          <span class="tm-colhead">Present</span>
          <span class="tm-colhead">Past</span>
          <span class="tm-colhead">Future</span>
        </div>
        <?php $tm_r = 0; foreach ($tense_matrix as $group => $times): $tm_r++; ?>
        <details class="tm-details" open>
          <summary class="tm-summary">
            <span class="tm-summary-label"><?php echo esc_html($group); ?></span>
            <span class="tm-summary-meta">3 tenses <span class="tm-chevron"></span></span>
          </summary>
        <div class="tm-row">
          <span class="tm-rowlabel"><?php echo esc_html($group); ?></span>
          <?php $tm_c = 0; foreach (['Present','Past','Future'] as $time):
            $t = $times[$time]; $tm_c++;
            // Real published lesson? Link straight to it (the page already promises
            // this). No lesson yet? Fall back to filtering instead of a dead link.
            $tm_url    = !empty($t['link_slug']) ? me_lesson_url($t['link_slug']) : '';
            $tm_action = $tm_url
              ? "location.href='" . esc_js($tm_url) . "'"
              : "goToTense('" . esc_js($t['level']) . "','" . esc_js($t['slug']) . "')";
          ?>
          <div class="tm-cell reveal" style="--cell-tint:<?php echo esc_attr($tense_level_dot[$t['level']]); ?>;--rd:<?php echo $tm_c * 45; ?>ms" onclick="<?php echo $tm_action; ?>">
            <div class="tm-cell-top">
              <span class="tm-cell-dot" style="background:<?php echo esc_attr($tense_level_dot[$t['level']]); ?>"></span>
              <span class="tm-cell-level"><?php echo esc_html($tense_level_label[$t['level']]); ?></span>
            </div>
            <span class="tm-cell-label"><?php echo esc_html($t['label']); ?></span>
            <span class="tm-cell-ex"><?php echo esc_html($t['example']); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <script>
    /* Runs immediately as the parser hits this point — closes the tense groups
       on narrow viewports before the rest of the page paints, so mobile doesn't
       flash open then snap shut. Desktop is untouched (stays open natively). */
    if (window.innerWidth <= 768) {
      document.querySelectorAll('.tm-details').forEach(function (d) { d.removeAttribute('open'); });
    }
  </script>
  <?php endif; ?>

  <div class="ls-topics">
    <div class="wrap">
      <div class="ls-topics-inner reveal" data-level="<?php echo esc_attr($key); ?>" style="--pill-fill:<?php echo esc_attr($lvl['fill']); ?>;--pill-mid:<?php echo esc_attr($lvl['mid']); ?>;--pill-ink:<?php echo esc_attr($lvl['deep']); ?>">
        <span class="ls-topics-label">Topics covered:</span>
        <span class="tp tp-all on" data-slug="all"
          onclick="filterTopic(this,'<?php echo esc_js($key); ?>','all')">
          All Lessons
        </span>
        <?php foreach ($lvl['topics'] as $t): if ($t['count'] < 1) continue; ?>
        <?php if ($t['direct_link']): ?>
        <a class="tp" data-slug="<?php echo esc_attr($t['slug']); ?>" href="<?php echo esc_url($t['direct_link']); ?>">
          <span class="tp-dot"></span><?php echo esc_html($t['label']); ?>
        </a>
        <?php else: ?>
        <span class="tp" data-slug="<?php echo esc_attr($t['slug']); ?>"
          onclick="filterTopic(this,'<?php echo esc_js($key); ?>','<?php echo esc_js($t['slug']); ?>')">
          <span class="tp-dot"></span><?php echo esc_html($t['label']); ?>
        </span>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="ls-lessons">
    <div class="wrap">
      <div class="ls-lessons-header reveal">
        <div><h3><?php echo esc_html($lvl['label']); ?> Lessons</h3><p>New written lessons regularly — video added as it's ready</p></div>
        <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="btn-yt">&#9654; View on YouTube</a>
      </div>
      <div class="ls-filter-status hidden" id="filterStatus-<?php echo esc_attr($key); ?>">
        <span class="ls-filter-text"></span>
        <button class="ls-filter-clear" onclick="clearFilter('<?php echo esc_js($key); ?>')">Clear filter ✕</button>
      </div>

      <div class="lesson-grid" id="grid-<?php echo esc_attr($key); ?>">
        <?php foreach ($lvl['lessons'] as $i => $ls):
          $num = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
          $tagsAttr = esc_attr(implode(' ', $ls['tags']));
          $liveUrl    = ($ls['status'] === 'live') ? me_lesson_url($ls['link_slug'] ?? '') : '';
          $hasWritten = ! empty($liveUrl);
          $hasVideo   = ! empty($ls['youtube'] ?? '');
        ?>
        <div class="lesson-card reveal" style="--rd:<?php echo ($i % 3) * 80; ?>ms" data-tilt data-topics="<?php echo $tagsAttr; ?>">
          <div class="lc-bar" style="background:<?php echo esc_attr($lvl['deep']); ?>"></div>

          <?php if ($hasVideo): ?>
          <a href="<?php echo esc_url($ls['youtube']); ?>" target="_blank" rel="noopener" class="lc-thumb">
            <div class="lc-inner" style="background:linear-gradient(145deg,#20263A 0%,#3A425C 100%)">
              <div class="lc-watermark"><?php echo me_level_icon($lvl['icon'], '#fff', 84); ?></div>
              <div class="lc-play">&#9654;</div>
              <span class="lc-coming">Watch Now</span>
            </div>
            <span class="lc-num"><?php echo $num; ?></span>
          </a>
          <?php elseif ($hasWritten): ?>
          <div class="lc-thumb lc-thumb-written" style="background:<?php echo esc_attr($lvl['fill']); ?>">
            <div class="lc-watermark-sm"><?php echo me_level_icon($lvl['icon'], $lvl['deep'], 40); ?></div>
            <span class="lc-readtime" style="color:<?php echo esc_attr($lvl['deep']); ?>">&#128214; <?php echo esc_html($ls['read_time'] ?? '7 min read'); ?></span>
            <span class="lc-num" style="color:<?php echo esc_attr($lvl['deep']); ?>;opacity:.5"><?php echo $num; ?></span>
          </div>
          <?php else: ?>
          <div class="lc-thumb lc-thumb-soon">
            <div class="lc-inner" style="background:linear-gradient(145deg,#20263A 0%,#3A425C 100%)">
              <div class="lc-watermark"><?php echo me_level_icon($lvl['icon'], '#fff', 84); ?></div>
              <span class="lc-coming">Coming Soon</span>
            </div>
            <span class="lc-num"><?php echo $num; ?></span>
          </div>
          <?php endif; ?>

          <div class="lc-body">
            <div class="lc-topic" style="color:<?php echo esc_attr($lvl['deep']); ?>"><?php echo esc_html($ls['topic']); ?></div>
            <h4><?php echo esc_html($ls['title']); ?></h4>
            <span class="lc-hindi" style="color:<?php echo esc_attr($lvl['deep']); ?>"><?php echo esc_html($ls['hindi']); ?></span>
            <p><?php echo esc_html($ls['desc']); ?></p>
          </div>
          <div class="lc-footer">
            <?php if ($hasWritten): ?>
              <a href="<?php echo esc_url($liveUrl); ?>" class="lc-read-live">&#128214; Read Lesson</a>
            <?php elseif ($ls['status'] === 'live'): ?>
              <span class="lc-read-soon">&#128214; Lesson syncing&hellip;</span>
            <?php else: ?>
              <span class="lc-read-soon">&#128214; Lesson coming soon</span>
            <?php endif; ?>
            <?php if ($hasVideo): ?>
              <a href="<?php echo esc_url($ls['youtube']); ?>" target="_blank" rel="noopener" class="lc-yt">&#9654; Watch</a>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="ls-empty" id="empty-<?php echo esc_attr($key); ?>">
        <div class="ls-empty-icon">🎬</div>
        <h4>More lessons on this topic coming soon</h4>
        <p>Subscribe on YouTube to get notified the moment they're live.</p>
      </div>

      <div class="cs-banner reveal-scale">
        <div>
          <h3><?php echo esc_html($lvl['cta_h']); ?></h3>
          <p><?php echo esc_html($lvl['cta_p']); ?></p>
          <span class="cs-hi"><?php echo esc_html($lvl['cta_hi']); ?></span>
        </div>
        <div class="cs-btns">
          <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="btn-solid btn-yt-solid">&#9654; Subscribe Free</a>
          <a href="<?php echo home_url('/quizzes/'); ?>" class="btn-outline-lt">Test Your Level</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- FOOTER -->
<footer class="me-footer">
  <div class="wrap">
    <div class="foot-grid reveal">
      <div>
        <a href="<?php echo home_url('/'); ?>" class="foot-logo">Maninder<em>English</em></a>
        <div class="foot-hi">English + Psychology = Fluency</div>
        <p class="foot-desc">Psychology-based English learning for Indian learners. Built on 7 years of real British workplace experience.</p>
      </div>
      <div class="foot-col"><h4>Learn</h4><ul>
        <li><a href="<?php echo home_url('/levels/'); ?>">Choose Your Level</a></li>
     
        <li><a href="<?php echo home_url('/grammar/'); ?>">Grammar</a></li>
        <li><a href="<?php echo home_url('/vocabulary/'); ?>">Vocabulary</a></li>
        <li><a href="<?php echo home_url('/quizzes/'); ?>">Quizzes</a></li>
      </ul></div>
      <div class="foot-col"><h4>About</h4><ul>
        <li><a href="<?php echo home_url('/about/'); ?>">About Maninder</a></li>
        <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
        <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">YouTube Channel</a></li>
      </ul></div>
      <div class="foot-col"><h4>Connect</h4><ul>
        <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">&#9654; YouTube</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Facebook</a></li>
      </ul></div>
    </div>
    <div class="foot-bottom">
      <span class="foot-copy">&copy; <?php echo date('Y'); ?> Maninder English &middot; maninderenglish.com &middot; Built for Indian learners &middot; Ludhiana, Punjab</span>
      <div class="me-socials">
        <a class="me-soc" href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.9 12 4.9 12 4.9s-7 0-8.9.5A3 3 0 0 0 1 7.5 31 31 0 0 0 .5 12 31 31 0 0 0 1 16.5a3 3 0 0 0 2.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5A3 3 0 0 0 23 16.5 31 31 0 0 0 23.5 12 31 31 0 0 0 23 7.5ZM9.8 15.3V8.7l5.7 3.3Z"/></svg></a>
        <a class="me-soc" href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 3.2-1.6 4.8-4.9 4.9-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1C3.8 21.8 2.2 20.2 2.1 17c-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9C2.2 3.8 3.8 2.2 7.1 2.1 8.4 2.2 8.8 2.2 12 2.2Zm0 1.8c-3.1 0-3.5 0-4.7.1-2.2.1-3.2 1.1-3.3 3.3C4 8.6 4 9 4 12s0 3.4.1 4.7c.1 2.2 1.1 3.2 3.3 3.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c2.2-.1 3.2-1.1 3.3-3.3.1-1.2.1-1.6.1-4.7s0-3.4-.1-4.7c-.1-2.2-1.1-3.2-3.3-3.3C15.5 4 15.1 4 12 4Zm0 3.1a4.9 4.9 0 1 1 0 9.8 4.9 4.9 0 0 1 0-9.8Zm0 8a3.1 3.1 0 1 0 0-6.2 3.1 3.1 0 0 0 0 6.2Zm6.3-8.2a1.1 1.1 0 1 1-2.3 0 1.1 1.1 0 0 1 2.3 0Z"/></svg></a>
      </div>
    </div>
  </div>
</footer>

<script>
/* ── TAB SWITCHING ── */
function switchLevel(level, btn) {
  document.querySelectorAll('.level-section').forEach(s => s.classList.remove('active'));
  document.querySelectorAll('.ltab').forEach(t => t.classList.remove('on'));
  document.getElementById('sec-' + level).classList.add('active');
  btn.classList.add('on');

  const sec = document.getElementById('sec-' + level);
  sec.querySelectorAll('.reveal, .reveal-left, .reveal-scale').forEach((el, i) => {
    el.classList.remove('in');
    const rd = parseInt(el.style.getPropertyValue('--rd') || 0) || i * 60;
    setTimeout(() => el.classList.add('in'), 80 + rd);
  });
  sec.querySelectorAll('.cnt').forEach(el => { delete el.dataset.counted; runCounter(el); });
}

/* TENSE MATRIX — jump to the right level AND filter straight to that tense's lessons */
function goToTense(level, slug) {
  const btn = document.querySelector('.ltab[data-level="' + level + '"]');
  const alreadyActive = btn && btn.classList.contains('on');

  /* Only run the tab-switch (and its reveal-animation reset) if we're
     actually changing tabs — this is what was wiping the pill bar even
     when jumping within the same, already-active Beginner tab. */
  if (btn && !alreadyActive) switchLevel(level, btn);

  const doFilter = () => {
    const bar  = document.querySelector('.ls-topics-inner[data-level="' + level + '"]');
    const pill = bar && bar.querySelector('.tp[data-slug="' + slug + '"]');
    if (pill) filterTopic(pill, level, slug);
    /* Scroll to the topic bar / lesson list itself, not #level-tabs —
       level-tabs sits above this content, so scrolling there was moving
       the page away from the very thing we just filtered. */
    (bar || document.getElementById('level-tabs')).scrollIntoView({ behavior: 'smooth', block: 'start' });
  };

  if (alreadyActive) {
    doFilter(); // no tab switch happened, so no reveal-reset race to wait out
  } else {
    setTimeout(doFilter, 160);
  }
}

/* ── FUNCTIONAL TOPIC FILTER ── */
function filterTopic(pill, level, slug) {
  const bar = document.querySelector('.ls-topics-inner[data-level="' + level + '"]');
  const grid = document.getElementById('grid-' + level);
  const empty = document.getElementById('empty-' + level);
  const statusEl = document.getElementById('filterStatus-' + level);
  if (!bar || !grid) return;

  /* Reset every pill in this bar to its neutral resting look, then activate the clicked one */
  bar.querySelectorAll('.tp').forEach(p => p.classList.remove('on'));
  pill.classList.add('on');

  grid.classList.add('filtering');
  setTimeout(() => {
    const cards = grid.querySelectorAll('.lesson-card');
    let visibleCount = 0;
    cards.forEach(card => {
      const topics = (card.dataset.topics || '').split(' ').filter(Boolean);
      const matches = (slug === 'all') || topics.includes(slug);
      card.classList.toggle('lc-hidden', !matches);
      if (matches) visibleCount++;
    });

    empty.classList.toggle('show', visibleCount === 0);
    grid.style.display = visibleCount === 0 ? 'none' : '';

    if (slug === 'all') {
      statusEl.classList.add('hidden');
    } else {
      statusEl.classList.remove('hidden');
      const label = pill.textContent.replace(/\(\d+\)/, '').trim();
      statusEl.querySelector('.ls-filter-text').textContent =
        'Showing ' + visibleCount + ' lesson' + (visibleCount === 1 ? '' : 's') + ' — filtered by "' + label + '"';
    }

    grid.classList.remove('filtering');
    grid.querySelectorAll('.lesson-card:not(.lc-hidden)').forEach((el, i) => {
      el.classList.remove('in');
      void el.offsetWidth; /* force reflow so animation restarts */
      setTimeout(() => el.classList.add('in'), i * 55);
    });

    scrollToResultsOnMobile(level);
  }, 200);
}

/* Mobile-only: a pill tap filters a grid that's often way off-screen on this page's
   taller mobile layout, so without this the tap silently does nothing visible.
   Skips the scroll if the results are already reasonably in view (avoids yanking
   the page when someone's already scrolled down manually). */
function scrollToResultsOnMobile(level) {
  if (window.innerWidth > 768) return;
  const target = document.getElementById('filterStatus-' + level) || document.getElementById('grid-' + level);
  if (!target) return;
  const stickyOffset = 130; /* sticky nav + sticky level-tabs bar height on mobile */
  const rect = target.getBoundingClientRect();
  if (rect.top >= stickyOffset && rect.top <= window.innerHeight * 0.6) return;
  window.scrollTo({ top: window.scrollY + rect.top - stickyOffset, behavior: 'smooth' });
}

function clearFilter(level) {
  const allPill = document.querySelector('.ls-topics-inner[data-level="' + level + '"] .tp-all');
  if (allPill) filterTopic(allPill, level, 'all');
}

/* COUNTER ANIMATION — same easing as homepage hero stats */
function runCounter(el) {
  if (!el || el.dataset.counted) return;
  el.dataset.counted = '1';
  const end = parseInt(el.dataset.c, 10) || 0;
  const dur = 900;
  const start = performance.now();
  function tick(now) {
    const p = Math.min((now - start) / dur, 1);
    const ease = 1 - Math.pow(1 - p, 3);
    el.textContent = Math.round(ease * end);
    if (p < 1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}

/* PROGRESS BAR + NAV SCROLL */
const spb = document.getElementById('spb');
window.addEventListener('scroll', () => {
  const s = document.documentElement;
  if (spb) spb.style.width = (s.scrollTop / (s.scrollHeight - s.clientHeight) * 100) + '%';
  document.getElementById('me-nav').classList.toggle('scrolled', window.scrollY > 20);
}, { passive: true });

/* INTERSECTION OBSERVER — smooth staggered reveals */
function triggerReveals() {
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const rd = parseInt(e.target.style.getPropertyValue('--rd') || 0) || 0;
        setTimeout(() => {
          e.target.classList.add('in');
          if (e.target.classList.contains('cnt')) runCounter(e.target);
          e.target.querySelectorAll('.cnt').forEach(runCounter);
        }, rd);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.05, rootMargin: '0px 0px -10% 0px' });
  document.querySelectorAll('.reveal:not(.in), .reveal-left:not(.in), .reveal-scale:not(.in)').forEach(el => io.observe(el));
}

/* ── 3D CURSOR TILT on lesson cards (same physics as homepage) ── */
(function () {
  const isCoarsePointer = window.matchMedia('(pointer: coarse)').matches;
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (isCoarsePointer || reducedMotion) return;
  document.querySelectorAll('[data-tilt]').forEach(card => {
    let raf = null;
    const MAX_TILT = 6, LIFT = 10, SCALE = 1.015;
    card.addEventListener('mousemove', e => {
      if (raf) return;
      raf = requestAnimationFrame(() => {
        const rect = card.getBoundingClientRect();
        const px = (e.clientX - rect.left) / rect.width;
        const py = (e.clientY - rect.top) / rect.height;
        const rotY = (px - 0.5) * MAX_TILT * 2;
        const rotX = (0.5 - py) * MAX_TILT * 2;
        card.style.transform = `perspective(900px) translateY(-${LIFT}px) scale(${SCALE}) rotateX(${rotX.toFixed(2)}deg) rotateY(${rotY.toFixed(2)}deg)`;
        raf = null;
      });
    });
    card.addEventListener('mouseleave', () => { card.style.transform = ''; });
  });
})();

/* ── MAGNETIC PULL on topic pills — pill shifts toward the cursor, no particle DOM ── */
(function () {
  const isCoarsePointer = window.matchMedia('(pointer: coarse)').matches;
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (isCoarsePointer || reducedMotion) return;
  const MAX_PULL = 6, LIFT = 3;
  document.querySelectorAll('.tp').forEach(pill => {
    let raf = null;
    pill.addEventListener('mousemove', e => {
      if (raf) return;
      raf = requestAnimationFrame(() => {
        const rect = pill.getBoundingClientRect();
        const px = (e.clientX - rect.left) / rect.width - 0.5;
        const py = (e.clientY - rect.top) / rect.height - 0.5;
        pill.style.transform = `translate(${(px * MAX_PULL).toFixed(1)}px, ${(py * MAX_PULL - LIFT).toFixed(1)}px)`;
        raf = null;
      });
    });
    pill.addEventListener('mouseleave', () => { pill.style.transform = ''; });
  });
})();

/* INIT */
document.addEventListener('DOMContentLoaded', () => {
  /* ── DEEP LINK: /levels/?level=beginner|intermediate|advanced|business ── */
  const allowedLevels = ['beginner', 'intermediate', 'advanced', 'business'];
  const requestedLevel = new URLSearchParams(window.location.search).get('level');
  let startLevel = 'beginner';

  if (requestedLevel && allowedLevels.includes(requestedLevel)) {
    startLevel = requestedLevel;
    const targetBtn = document.querySelector('.ltab[data-level="' + requestedLevel + '"]');
    if (targetBtn) {
      document.querySelectorAll('.level-section').forEach(s => s.classList.remove('active'));
      document.querySelectorAll('.ltab').forEach(t => t.classList.remove('on'));
      document.getElementById('sec-' + requestedLevel).classList.add('active');
      targetBtn.classList.add('on');
    }
  }

  triggerReveals();
});

/* HAMBURGER */
const burger = document.getElementById('me-hamburger');
const navLinks = document.getElementById('me-nav-links');
if (burger) burger.addEventListener('click', () => {
  const open = navLinks.style.display === 'flex';
  navLinks.style.cssText = open ? '' : 'display:flex;flex-direction:column;position:absolute;top:68px;left:0;right:0;background:#fff;padding:12px 20px 16px;border-bottom:1px solid #E8E4DC;z-index:399;box-shadow:0 8px 24px rgba(0,0,0,.08)';
});
</script>
<?php wp_footer(); ?>
</body>
</html>
