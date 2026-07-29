<?php
/**
 * Maninder English Child Theme — functions.php
 * Handles: parent style enqueue, custom template loader, nav menus, theme support
 */

// ── 1. ENQUEUE PARENT + CHILD STYLES ────────────────────────────────────────
add_action( 'wp_enqueue_scripts', 'me_enqueue_styles' );
function me_enqueue_styles() {
    // Parent Astra styles
    wp_enqueue_style(
        'astra-parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( 'astra' )->get( 'Version' )
    );

    // Google Fonts used by homepage
    wp_enqueue_style(
        'me-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap',
        array(),
        null
    );

    // Premium foundation layer: tokens, spacing, type, shadows, components, motion.
    wp_enqueue_style(
        'me-design-system',
        get_stylesheet_directory_uri() . '/assets/design-system.css',
        array( 'astra-parent-style', 'me-fonts' ),
        '1.1.0'
    );

    wp_enqueue_style(
        'me-features',
        get_stylesheet_directory_uri() . '/assets/me-features.css',
        array( 'me-design-system' ),
        '1.1.0'
    );

    // Child theme overrides
    wp_enqueue_style(
        'me-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'me-design-system', 'me-features' ),
        '1.1.0'
    );

    wp_enqueue_script(
        'me-motion',
        get_stylesheet_directory_uri() . '/assets/motion.js',
        array(),
        '1.1.0',
        true
    );

    wp_script_add_data( 'me-motion', 'defer', true );

    // Homepage JS (only load on front page or page using our custom template)
    if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
        wp_enqueue_style(
            'me-home-premium',
            get_stylesheet_directory_uri() . '/assets/home-premium.css',
            array( 'me-child-style' ),
            '1.2.0'
        );

        wp_enqueue_script(
            'me-home-js',
            get_stylesheet_directory_uri() . '/assets/home.js',
            array(),
            '1.2.0',
            true // load in footer
        );
    }

    if ( is_page_template( 'page-grammar-hub.php' ) ) {
        wp_enqueue_style(
            'me-grammar-premium',
            get_stylesheet_directory_uri() . '/assets/grammar-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }

    if ( is_page_template( 'page-levels.php' ) ) {
        wp_enqueue_style(
            'me-levels-premium',
            get_stylesheet_directory_uri() . '/assets/levels-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }

    if ( is_page_template( 'page-grammar-single.php' ) ) {
        wp_enqueue_style(
            'me-lesson-premium',
            get_stylesheet_directory_uri() . '/assets/lesson-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }

    if ( is_page_template( 'page-vocabulary.php' ) || is_page( 'vocabulary' ) ) {
        wp_enqueue_style(
            'me-vocabulary-premium',
            get_stylesheet_directory_uri() . '/assets/vocabulary-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }

    if ( is_page_template( 'page-about.php' ) || is_page( 'about' ) ) {
        wp_enqueue_style(
            'me-about-premium',
            get_stylesheet_directory_uri() . '/assets/about-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }

    if ( is_page_template( 'page-quizzes.php' ) || is_page( 'quizzes' ) ) {
        wp_enqueue_style(
            'me-quizzes-premium',
            get_stylesheet_directory_uri() . '/assets/quizzes-premium.css',
            array( 'me-child-style' ),
            '1.3.0'
        );
    }
}

// ── 2. THEME SUPPORT ─────────────────────────────────────────────────────────
add_action( 'after_setup_theme', 'me_theme_support' );
function me_theme_support() {
    // Navigation menus
    register_nav_menus( array(
        'primary'  => __( 'Primary Navigation', 'maninderenglish-child' ),
        'footer'   => __( 'Footer Links', 'maninderenglish-child' ),
    ) );
    // Title tag
    add_theme_support( 'title-tag' );
    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    // HTML5 markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}

// ── 3. CUSTOM PAGE TEMPLATE LOADER ───────────────────────────────────────────
// Makes page-home.php available as a selectable template in the WP page editor
add_filter( 'theme_page_templates', 'me_register_page_templates' );
function me_register_page_templates( $templates ) {
    $templates['page-home.php']    = 'Maninder English — Homepage';
    $templates['page-inner.php']   = 'Maninder English — Inner Page (Elementor)';
    return $templates;
}

// ── 4. REMOVE ASTRA HEADER/FOOTER ON CUSTOM TEMPLATE PAGES ──────────────────
// XPRO handles header/footer — tell Astra to step aside on our custom pages
add_action( 'wp', 'me_maybe_remove_astra_chrome' );
function me_maybe_remove_astra_chrome() {
    $me_custom_templates = array(
        'page-home.php',
        'page-levels.php',
        'page-grammar-hub.php',
        'page-grammar-single.php',
        'page-vocabulary.php',
        'page-about.php',
        'page-quizzes.php',
        'page-lesson-single.php',
    );

    foreach ( $me_custom_templates as $me_template ) {
        if ( is_page_template( $me_template ) ) {
            // Remove Astra's default header
            remove_action( 'astra_header', 'astra_header_markup' );
            // Remove Astra's default footer
            remove_action( 'astra_footer', 'astra_footer_markup' );
            break;
        }
    }
}

// ── 5. HELPER: GET YOUTUBE CHANNEL URL ───────────────────────────────────────
// Change the handle here if it changes — used across homepage template
define( 'ME_YT_CHANNEL', 'https://www.youtube.com/@englishwithmaninder' );
define( 'ME_YT_HANDLE',  '@englishwithmaninder' );
define( 'ME_SITE_NAME',  'Maninder English' );
define( 'ME_TAGLINE',    'English + Psychology = Fluency' );

// ── 6. SUREFORMS SHORTCODE HELPER ────────────────────────────────────────────
// Returns contact form shortcode — update form ID after creating in SureForms
// To find your form ID: SureForms → Forms → hover the form → note the ID in URL
if ( ! defined( 'ME_CONTACT_FORM_ID' ) ) {
    define( 'ME_CONTACT_FORM_ID', 1 ); // ← UPDATE THIS after creating SureForms form
}
function me_contact_form() {
    return do_shortcode( '[sureforms id="' . ME_CONTACT_FORM_ID . '"]' );
}

// ── 7. WORD OF THE DAY — CUSTOM POST TYPE (future-ready) ─────────────────────
// Uncomment when you're ready to manage WOTD from the WP dashboard
/*
add_action( 'init', 'me_register_wotd_cpt' );
function me_register_wotd_cpt() {
    register_post_type( 'wotd', array(
        'label'  => 'Word of the Day',
        'public' => true,
        'supports' => array( 'title', 'editor', 'custom-fields' ),
        'show_in_rest' => true,
    ) );
}
*/

// ── 8. LESSONS — CUSTOM POST TYPE (RETIRED, superseded by grammar_lesson) ────
// This was the original "future-ready" lesson system, replaced by the
// grammar_lesson CPT once real lessons started being built via the Code
// Editor workflow. Disabled below — this is what removes the duplicate
// "Lessons" item from the wp-admin sidebar. Before deploying this change,
// empty the Trash under Lessons (3 items) from wp-admin while the post type
// is still registered, so nothing orphaned is left in the database.
/*
add_action( 'init', 'me_register_lessons_cpt' );
function me_register_lessons_cpt() {
    register_post_type( 'lesson', array(
        'label'  => 'Lessons',
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
        'show_in_rest' => true,
        'taxonomies' => array( 'level', 'topic' ),
    ) );
    register_taxonomy( 'level', 'lesson', array(
        'label' => 'Level',
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'topic', 'lesson', array(
        'label' => 'Topic',
        'hierarchical' => false,
        'show_in_rest' => true,
    ) );
}
*/

// ─── Quiz CPT ──────────────────────────────────────────────────────────────
// Add this block to functions.php near your existing CPT registrations.
// After saving, go to Settings → Permalinks → Save Changes to flush rewrite rules.

function me_register_quiz_cpt() {

    register_post_type( 'quiz', array(
        'labels' => array(
            'name'          => 'Quizzes',
            'singular_name' => 'Quiz',
            'add_new_item'  => 'Add New Quiz',
            'edit_item'     => 'Edit Quiz',
            'search_items'  => 'Search Quizzes',
            'not_found'     => 'No quizzes found',
            'menu_name'     => 'Quizzes',
        ),
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'supports'          => array( 'title', 'custom-fields' ),
        'menu_icon'         => 'dashicons-list-view',
        'rewrite'           => array( 'slug' => 'quiz' ),
        'has_archive'       => false,
    ) );

    register_taxonomy( 'quiz_topic', 'quiz', array(
        'labels' => array(
            'name'          => 'Quiz Topics',
            'singular_name' => 'Topic',
            'add_new_item'  => 'Add New Topic',
            'edit_item'     => 'Edit Topic',
            'menu_name'     => 'Topics',
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'hierarchical' => false,
        'rewrite'      => false,
    ) );
}
add_action( 'init', 'me_register_quiz_cpt' );


// ─── Quiz permalink filter ─────────────────────────────────────────────────
// Routes /quiz/[slug]/ through page-quiz-single.php
function me_quiz_template( $template ) {
    if ( is_singular( 'quiz' ) ) {
        $custom = get_stylesheet_directory() . '/page-quiz-single.php';
        if ( file_exists( $custom ) ) return $custom;
    }
    return $template;
}
add_filter( 'single_template', 'me_quiz_template' );


/**
 * ════════════════════════════════════════════════════════════
 * MANINDER ENGLISH — FUNCTIONS.PHP ADDITIONS
 * Add ALL of this to the bottom of your existing functions.php
 * ════════════════════════════════════════════════════════════
 *
 * BEFORE YOU START — Add this line to wp-config.php:
 * define( 'ME_GITHUB_TOKEN', 'your_actual_token_here' );
 *
 * Replace 'your_actual_token_here' with your real GitHub token.
 * NEVER paste the token directly in this file.
 * ════════════════════════════════════════════════════════════
 */


/* ════════════════════════════════════════════════════════════
   SECTION 1 — AI HINGLISH GRAMMAR TUTOR
   Uses GitHub Models API (openai/gpt-4o)
   ════════════════════════════════════════════════════════════ */

/**
 * Register AJAX handlers — works for both logged-in and guest users
 */
add_action( 'wp_ajax_me_grammar_check',        'me_grammar_check_handler' );
add_action( 'wp_ajax_nopriv_me_grammar_check', 'me_grammar_check_handler' );

function me_grammar_check_handler() {

    // 1. Verify nonce — security first
    check_ajax_referer( 'me_grammar_nonce', 'nonce' );

    // 2. Sanitize user input
    $user_text = sanitize_textarea_field( wp_unslash( $_POST['user_text'] ?? '' ) );

    if ( empty( $user_text ) ) {
        wp_send_json_error( array( 'message' => 'Please enter some text.' ) );
    }

    if ( strlen( $user_text ) > 1000 ) {
        wp_send_json_error( array( 'message' => 'Please keep your text under 1000 characters.' ) );
    }

    // 3. Get token from wp-config.php
    $token = defined( 'ME_GITHUB_TOKEN' ) ? ME_GITHUB_TOKEN : '';
    if ( empty( $token ) ) {
        wp_send_json_error( array( 'message' => 'API not configured. Please contact the site admin.' ) );
    }

    // 4. Build the AI system prompt — British English teacher persona
    $system_prompt = "You are an expert British English teacher named Maninder who specialises in teaching Indian learners. You explain grammar mistakes in a friendly, clear way using BOTH English and Hindi (Hinglish style).

Your response format:
- Start with a brief assessment in English
- List each mistake found with: the error, why it is wrong, and the correct version
- Use Hindi/Hinglish explanations to make it crystal clear (e.g. 'Yeh galat hai kyunki...')
- End with an encouraging note in Hinglish

Keep responses concise, warm, and educational. Use simple language. Never be harsh.
Format your response in plain text — no markdown symbols like ** or ##.";

    // 5. Call GitHub Models API
    $response = wp_remote_post(
        'https://models.github.ai/inference/chat/completions',
        array(
            'timeout' => 30,
            'headers' => array(
                'Accept'            => 'application/vnd.github+json',
                'Authorization'     => 'Bearer ' . $token,
                'X-GitHub-Api-Version' => '2022-11-28',
                'Content-Type'      => 'application/json',
            ),
            'body' => wp_json_encode( array(
                'model'       => 'openai/gpt-4o',
                'max_tokens'  => 800,
                'temperature' => 0.4,
                'messages'    => array(
                    array( 'role' => 'system',  'content' => $system_prompt ),
                    array( 'role' => 'user',    'content' => 'Please check this English text for grammar mistakes: "' . $user_text . '"' ),
                ),
            ) ),
        )
    );

    // 6. Handle API errors
    if ( is_wp_error( $response ) ) {
        wp_send_json_error( array( 'message' => 'Connection error. Please try again.' ) );
    }

    $body = json_decode( wp_remote_retrieve_body( $response ), true );
    $ai_reply = $body['choices'][0]['message']['content'] ?? '';

    if ( empty( $ai_reply ) ) {
        wp_send_json_error( array( 'message' => 'No response from AI. Please try again.' ) );
    }

    wp_send_json_success( array( 'reply' => $ai_reply ) );
}

/**
 * Enqueue the AI tutor script and pass nonce + AJAX URL to JS
 */
add_action( 'wp_enqueue_scripts', 'me_enqueue_ai_tutor_assets' );
function me_enqueue_ai_tutor_assets() {
    // Only load on pages that use the AI tutor shortcode
    global $post;
    if ( ! is_a( $post, 'WP_Post' ) || ! has_shortcode( $post->post_content, 'me_grammar_tutor' ) ) {
        // Also load on lesson pages
        if ( ! is_page_template( 'page-lesson-single.php' ) && ! is_page_template( 'page-lessons.php' ) ) {
            return;
        }
    }
    wp_enqueue_script(
        'me-ai-tutor',
        get_stylesheet_directory_uri() . '/assets/ai-tutor.js',
        array(),
        '1.0.0',
        true
    );
    wp_localize_script( 'me-ai-tutor', 'meAI', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'me_grammar_nonce' ),
    ) );
}

/**
 * Shortcode: [me_grammar_tutor]
 * Paste [me_grammar_tutor] into any WordPress page to embed the tutor
 */
add_shortcode( 'me_grammar_tutor', 'me_grammar_tutor_shortcode' );
function me_grammar_tutor_shortcode() {
    ob_start(); ?>
    <div id="me-ai-tutor" style="font-family:'Inter',sans-serif;max-width:680px;margin:0 auto">
      <div style="background:linear-gradient(135deg,#6633DD,#8B6CF6);border-radius:20px;padding:32px;color:#fff;margin-bottom:24px">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
          <span style="font-size:28px">🤖</span>
          <div>
            <h3 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;color:#fff;margin:0">AI Grammar Tutor</h3>
            <p style="color:rgba(255,255,255,.75);font-size:13px;margin:0">Powered by GPT-4o · Hindi + English explanations</p>
          </div>
        </div>
        <p style="color:rgba(255,255,255,.85);font-size:15px;margin:0">Type any English sentence or paragraph below. The AI will find mistakes and explain them in Hinglish — clear, friendly, and instant.</p>
      </div>
      <div style="background:#fff;border:1.5px solid #E8E4DC;border-radius:16px;padding:24px;margin-bottom:16px">
        <label for="me-ai-input" style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:10px;text-transform:uppercase;letter-spacing:.06em">Your English Text</label>
        <textarea id="me-ai-input" rows="5" placeholder='e.g. "I am having doubt about this. Please revert back to me at earliest."' style="width:100%;border:1.5px solid #E8E4DC;border-radius:12px;padding:16px;font-size:15px;font-family:'Inter',sans-serif;resize:vertical;outline:none;transition:border-color .2s;line-height:1.65;color:#111"></textarea>
        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:14px;flex-wrap:wrap;gap:10px">
          <span id="me-ai-charcount" style="font-size:12px;color:#aaa">0 / 1000 characters</span>
          <button id="me-ai-submit" style="background:linear-gradient(135deg,#6633DD,#8B6CF6);color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:15px;padding:12px 28px;border:none;border-radius:12px;cursor:pointer;transition:transform .2s,box-shadow .2s;display:flex;align-items:center;gap:8px">
            <span id="me-ai-btn-text">Check My English ✓</span>
          </button>
        </div>
      </div>
      <div id="me-ai-result" style="display:none"></div>
    </div>
    <?php
    return ob_get_clean();
}


/* ════════════════════════════════════════════════════════════
   SECTION 2 — AJAX LESSON SEARCH & FILTERING (RETIRED)
   Built for the old 'lesson' CPT — never fully wired (references a
   'lesson_category' taxonomy that was never registered) and superseded
   by grammar_lesson. Hooks below are disabled; function bodies left in
   place in case any part of this is worth reviving later.
   ════════════════════════════════════════════════════════════ */

// add_action( 'wp_ajax_me_lesson_search',        'me_lesson_search_handler' );
// add_action( 'wp_ajax_nopriv_me_lesson_search', 'me_lesson_search_handler' );

function me_lesson_search_handler() {

    check_ajax_referer( 'me_search_nonce', 'nonce' );

    $search   = sanitize_text_field( wp_unslash( $_POST['search']   ?? '' ) );
    $category = sanitize_key(         wp_unslash( $_POST['category'] ?? '' ) );
    $level    = sanitize_key(         wp_unslash( $_POST['level']    ?? '' ) );
    $paged    = max( 1, absint( $_POST['paged'] ?? 1 ) );

    // Build lightweight WP_Query
    $args = array(
        'post_type'      => 'lesson',
        'post_status'    => 'publish',
        'posts_per_page' => 9,
        'paged'          => $paged,
        'no_found_rows'  => false,
        'fields'         => 'all',
    );

    // Search
    if ( ! empty( $search ) ) {
        $args['s'] = $search;
    }

    // Category filter
    if ( ! empty( $category ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'lesson_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    // Level filter (add to tax_query)
    if ( ! empty( $level ) ) {
        $level_tax = array(
            'taxonomy' => 'level',
            'field'    => 'slug',
            'terms'    => $level,
        );
        if ( isset( $args['tax_query'] ) ) {
            $args['tax_query'][] = $level_tax;
            $args['tax_query']['relation'] = 'AND';
        } else {
            $args['tax_query'] = array( $level_tax );
        }
    }

    $query = new WP_Query( $args );

    ob_start();

    if ( $query->have_posts() ) {
        echo '<div class="me-search-grid">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $cats     = get_the_terms( get_the_ID(), 'lesson_category' );
            $cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : 'Lesson';
            $level_terms = get_the_terms( get_the_ID(), 'level' );
            $level_name  = ( $level_terms && ! is_wp_error( $level_terms ) ) ? $level_terms[0]->name : '';
            ?>
            <a href="<?php the_permalink(); ?>" class="me-lesson-card">
              <div class="me-lc-tag"><?php echo esc_html( $cat_name ); ?></div>
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
              <div class="me-lc-foot">
                <?php if ( $level_name ) : ?>
                <span class="me-lc-level"><?php echo esc_html( $level_name ); ?></span>
                <?php endif; ?>
                <span class="me-lc-read">Read &rarr;</span>
              </div>
            </a>
            <?php
        }
        echo '</div>';

        // Pagination info
        $total = $query->found_posts;
        $pages = $query->max_num_pages;
        echo '<div class="me-search-meta" data-total="' . $total . '" data-pages="' . $pages . '" data-paged="' . $paged . '">';
        echo '<span>' . $total . ' lesson' . ( $total !== 1 ? 's' : '' ) . ' found</span>';
        if ( $pages > 1 ) {
            echo '<div class="me-search-pages">';
            for ( $i = 1; $i <= $pages; $i++ ) {
                $active = ( $i === $paged ) ? ' active' : '';
                echo '<button class="me-pg-btn' . $active . '" data-page="' . $i . '">' . $i . '</button>';
            }
            echo '</div>';
        }
        echo '</div>';

    } else {
        echo '<div class="me-no-results">';
        echo '<span style="font-size:48px">🔍</span>';
        echo '<h3>No lessons found</h3>';
        echo '<p>Try a different search term or category.</p>';
        echo '</div>';
    }

    wp_reset_postdata();

    $html = ob_get_clean();
    wp_send_json_success( array( 'html' => $html ) );
}

/**
 * Shortcode: [me_lesson_search]
 * Embeds the search + filter UI on any page
 */
// add_shortcode( 'me_lesson_search', 'me_lesson_search_shortcode' );
function me_lesson_search_shortcode() {
    // Get all lesson categories for filter buttons
    $categories = get_terms( array(
        'taxonomy'   => 'lesson_category',
        'hide_empty' => true,
        'number'     => 20,
    ) );
    $levels = get_terms( array(
        'taxonomy'   => 'level',
        'hide_empty' => true,
    ) );

    ob_start(); ?>
    <div id="me-lesson-search-wrap">
      <!-- Search bar -->
      <div class="me-search-bar">
        <input type="text" id="me-search-input" placeholder="Search lessons... e.g. 'phrasal verbs', 'present perfect'" autocomplete="off">
        <span class="me-search-icon">🔍</span>
      </div>

      <!-- Category filters -->
      <?php if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) : ?>
      <div class="me-filter-row">
        <span class="me-filter-label">Category:</span>
        <div class="me-filter-btns" id="me-cat-filters">
          <button class="me-filter-btn active" data-cat="">All</button>
          <?php foreach ( $categories as $cat ) : ?>
          <button class="me-filter-btn" data-cat="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?></button>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Level filters -->
      <?php if ( ! is_wp_error( $levels ) && ! empty( $levels ) ) : ?>
      <div class="me-filter-row">
        <span class="me-filter-label">Level:</span>
        <div class="me-filter-btns" id="me-level-filters">
          <button class="me-filter-btn active" data-level="">All Levels</button>
          <?php foreach ( $levels as $lv ) : ?>
          <button class="me-filter-btn" data-level="<?php echo esc_attr( $lv->slug ); ?>"><?php echo esc_html( $lv->name ); ?></button>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Results -->
      <div id="me-search-results">
        <div class="me-search-loading" style="display:none">
          <div class="me-spinner"></div>
          <span>Searching lessons...</span>
        </div>
        <div id="me-results-container"></div>
      </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Enqueue search assets + nonce
 */
// add_action( 'wp_enqueue_scripts', 'me_enqueue_search_assets' );
function me_enqueue_search_assets() {
    global $post;
    if ( ! is_a( $post, 'WP_Post' ) || ! has_shortcode( $post->post_content, 'me_lesson_search' ) ) {
        return;
    }
    wp_enqueue_script(
        'me-lesson-search',
        get_stylesheet_directory_uri() . '/assets/lesson-search.js',
        array(), '1.0.0', true
    );
    wp_localize_script( 'me-lesson-search', 'meSearch', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'me_search_nonce' ),
    ) );
}


/* ════════════════════════════════════════════════════════════
   SECTION 3 — SPACED REPETITION SYSTEM (SRS) FLASHCARDS
   Logged-in users only. Uses user_meta for scheduling.
   ════════════════════════════════════════════════════════════ */

/**
 * Create SRS database table on theme activation
 * Run once by visiting any page after adding this code
 */
add_action( 'after_setup_theme', 'me_create_srs_table' );
function me_create_srs_table() {
    if ( get_option( 'me_srs_table_created' ) ) return;
    global $wpdb;
    $table = $wpdb->prefix . 'me_srs';
    $charset = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table (
        id          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        user_id     bigint(20) unsigned NOT NULL,
        card_id     varchar(100)        NOT NULL,
        next_review datetime            NOT NULL DEFAULT CURRENT_TIMESTAMP,
        interval_days int               NOT NULL DEFAULT 1,
        ease_factor float               NOT NULL DEFAULT 2.5,
        repetitions int                 NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        UNIQUE KEY user_card (user_id, card_id),
        KEY next_review (next_review)
    ) $charset;";
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
    update_option( 'me_srs_table_created', true );
}

/**
 * AJAX: Record a card review and calculate next review date
 * Algorithm: simplified SM-2 spaced repetition
 */
add_action( 'wp_ajax_me_srs_review', 'me_srs_review_handler' );
function me_srs_review_handler() {

    // Must be logged in
    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => 'Please log in to track your progress.' ) );
    }

    check_ajax_referer( 'me_srs_nonce', 'nonce' );

    $user_id  = get_current_user_id();
    $card_id  = sanitize_key( $_POST['card_id'] ?? '' );
    $rating   = sanitize_key( $_POST['rating']  ?? '' ); // 'again' | 'good' | 'easy'

    if ( empty( $card_id ) || ! in_array( $rating, array( 'again', 'good', 'easy' ), true ) ) {
        wp_send_json_error( array( 'message' => 'Invalid data.' ) );
    }

    global $wpdb;
    $table = $wpdb->prefix . 'me_srs';

    // Get existing record
    $existing = $wpdb->get_row( $wpdb->prepare(
        "SELECT * FROM $table WHERE user_id = %d AND card_id = %s",
        $user_id, $card_id
    ) );

    // SM-2 simplified calculation
    $ease     = $existing ? (float) $existing->ease_factor  : 2.5;
    $reps     = $existing ? (int)   $existing->repetitions  : 0;
    $interval = $existing ? (int)   $existing->interval_days : 1;

    switch ( $rating ) {
        case 'again': // Forgot — reset
            $interval = 1;
            $reps     = 0;
            $ease     = max( 1.3, $ease - 0.2 );
            break;
        case 'good': // Remembered with effort
            if ( $reps === 0 )      $interval = 1;
            elseif ( $reps === 1 )  $interval = 3;
            else                    $interval = (int) round( $interval * $ease );
            $reps++;
            break;
        case 'easy': // Remembered easily
            if ( $reps === 0 )      $interval = 4;
            elseif ( $reps === 1 )  $interval = 7;
            else                    $interval = (int) round( $interval * $ease * 1.3 );
            $ease = min( 4.0, $ease + 0.15 );
            $reps++;
            break;
    }

    // Cap interval at 180 days
    $interval = min( $interval, 180 );
    $next_review = gmdate( 'Y-m-d H:i:s', strtotime( "+{$interval} days" ) );

    // Upsert
    if ( $existing ) {
        $wpdb->update( $table,
            array( 'next_review' => $next_review, 'interval_days' => $interval, 'ease_factor' => $ease, 'repetitions' => $reps ),
            array( 'user_id' => $user_id, 'card_id' => $card_id ),
            array( '%s', '%d', '%f', '%d' ),
            array( '%d', '%s' )
        );
    } else {
        $wpdb->insert( $table,
            array( 'user_id' => $user_id, 'card_id' => $card_id, 'next_review' => $next_review, 'interval_days' => $interval, 'ease_factor' => $ease, 'repetitions' => $reps ),
            array( '%d', '%s', '%s', '%d', '%f', '%d' )
        );
    }

    wp_send_json_success( array(
        'next_review'   => $next_review,
        'interval_days' => $interval,
        'message'       => me_srs_message( $rating, $interval ),
    ) );
}

/**
 * AJAX: Get today's due cards for logged-in user
 */
add_action( 'wp_ajax_me_srs_get_deck', 'me_srs_get_deck_handler' );
function me_srs_get_deck_handler() {

    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => 'Please log in.' ) );
    }

    check_ajax_referer( 'me_srs_nonce', 'nonce' );

    $user_id = get_current_user_id();
    global $wpdb;
    $table = $wpdb->prefix . 'me_srs';
    $now   = gmdate( 'Y-m-d H:i:s' );

    $due_cards = $wpdb->get_col( $wpdb->prepare(
        "SELECT card_id FROM $table WHERE user_id = %d AND next_review <= %s ORDER BY next_review ASC LIMIT 20",
        $user_id, $now
    ) );

    wp_send_json_success( array( 'due_cards' => $due_cards ) );
}

function me_srs_message( $rating, $interval ) {
    $messages = array(
        'again' => 'Keep practising! Yeh kal phir aayega.',
        'good'  => 'Achha! ' . $interval . ' din baad dobara milenge.',
        'easy'  => 'Shandaar! ' . $interval . ' din baad milenge.',
    );
    return $messages[ $rating ];
}

/**
 * Shortcode: [me_flashcards]
 * Embeds the SRS flashcard deck on any page
 */

/**
 * Shortcode: [me_flashcards]
 * Optional attr: deck="deck-slug"  — filters by vocabulary_deck term slug
 * No login gate. Guests see cards; srs.js handles progress nudge toasts.
 *
 * Usage:
 *   [me_flashcards]                        — shows all published vocabulary words
 *   [me_flashcards deck="diplomatic-emails"] — shows only that deck's words
 */
add_shortcode( 'me_flashcards', 'me_flashcards_shortcode' );

function me_flashcards_shortcode( $atts ) {

    $atts = shortcode_atts( array(
        'deck' => '', // vocabulary_deck term slug
    ), $atts, 'me_flashcards' );

    $deck_slug = sanitize_title( $atts['deck'] );

    // ── Build query args ───────────────────────────────────────────────────
    $query_args = array(
        'post_type'      => 'vocabulary_word',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    if ( $deck_slug ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'vocabulary_deck',
                'field'    => 'slug',
                'terms'    => $deck_slug,
            ),
        );
    }

    $word_query = new WP_Query( $query_args );
    $cards      = array();

    if ( $word_query->have_posts() ) {
        while ( $word_query->have_posts() ) {
            $word_query->the_post();
            $post_id  = get_the_ID();
            $cards[]  = array(
                'id'        => $post_id,
                'word'      => get_the_title(),
                'phonetic'  => get_post_meta( $post_id, 'me_phonetic',  true ),
                'meaning'   => get_post_meta( $post_id, 'me_meaning',   true ),
                'hindi'     => get_post_meta( $post_id, 'me_hindi',     true ),
                'example'   => get_post_meta( $post_id, 'me_example',   true ),
            );
        }
        wp_reset_postdata();
    }

    // ── Fallback: hardcoded sample cards when CPT is empty ─────────────────
    // Remove this block once you have real vocabulary words in WP admin.
    if ( empty( $cards ) ) {
        $cards = array(
            array( 'id' => 'touch-base',   'word' => 'Touch base',   'phonetic' => '/tʌtʃ beɪs/',  'meaning' => 'To briefly contact someone to check in or share an update.',              'hindi' => 'Kisi se thodi baat karna — jaise "chalo ek baar baat karte hain"', 'example' => '"Let\'s touch base tomorrow before the presentation."' ),
            array( 'id' => 'loop-in',      'word' => 'Loop in',      'phonetic' => '/luːp ɪn/',    'meaning' => 'To include someone in a conversation or email chain.',                   'hindi' => 'Kisi ko conversation mein shamil karna — "inhe bhi batao"',       'example' => '"Please loop in Priya on this email."' ),
            array( 'id' => 'circle-back',  'word' => 'Circle back',  'phonetic' => '/ˈsɜːkl bæk/', 'meaning' => 'To return to a topic or person later.',                                 'hindi' => 'Baad mein waapas aana ya dobara baat karna',                      'example' => '"Let\'s circle back on this after the meeting."' ),
            array( 'id' => 'take-on-board','word' => 'Take on board', 'phonetic' => '/teɪk ɒn bɔːd/','meaning' => 'To accept and consider someone\'s suggestion or feedback.',            'hindi' => 'Kisi ki baat ya suggestion ko maan lena ya consider karna',        'example' => '"I\'ll take your feedback on board and revise the proposal."' ),
            array( 'id' => 'chase-up',     'word' => 'Chase up',     'phonetic' => '/tʃeɪs ʌp/',   'meaning' => 'To contact someone to remind them about something they have not done yet.','hindi' => 'Kisi ko remind karna kisi kaam ke baare mein jo unhone abhi nahi kiya','example' => '"Can you chase up the client about the invoice?"' ),
            array( 'id' => 'sign-off',     'word' => 'Sign off',     'phonetic' => '/saɪn ɒf/',    'meaning' => 'To formally approve something, or to end communication.',                'hindi' => 'Kuch approve karna, ya baat khatam karna',                        'example' => '"The manager needs to sign off on this before we proceed."' ),
        );
    }

    // ── Render ─────────────────────────────────────────────────────────────
    ob_start();
    $is_logged_in = is_user_logged_in() ? '1' : '0';
    ?>
    <div id="me-srs-wrap">

        <div class="me-srs-header">
            <div>
                <h3>🃏 Vocabulary Flashcards</h3>
                <p>Spaced repetition &mdash; review at the perfect time</p>
            </div>
            <div id="me-srs-progress"></div>
        </div>

        <div id="me-srs-deck">
            <?php foreach ( $cards as $i => $card ) : ?>
            <div class="me-srs-card"
                 data-card-id="<?php echo esc_attr( $card['id'] ); ?>"
                 data-index="<?php echo $i; ?>"
                 <?php echo $i > 0 ? 'style="display:none"' : ''; ?>>

                <div class="me-srs-card-inner">

                    <!-- FRONT -->
                    <div class="me-srs-front">
                        <span class="me-srs-card-num"><?php echo ( $i + 1 ); ?> of <?php echo count( $cards ); ?></span>
                        <h2 class="me-srs-word"><?php echo esc_html( $card['word'] ); ?></h2>
                        <?php if ( $card['phonetic'] ) : ?>
                            <p class="me-srs-phonetic"><?php echo esc_html( $card['phonetic'] ); ?></p>
                        <?php endif; ?>
                        <button class="me-srs-reveal-btn" onclick="meSRS.reveal(this)">Tap to reveal meaning</button>
                    </div>

                    <!-- BACK -->
                    <div class="me-srs-back" style="display:none">
                        <span class="me-srs-card-num"><?php echo ( $i + 1 ); ?> of <?php echo count( $cards ); ?></span>
                        <h2 class="me-srs-word"><?php echo esc_html( $card['word'] ); ?></h2>
                        <p class="me-srs-meaning"><?php echo esc_html( $card['meaning'] ); ?></p>
                        <?php if ( $card['hindi'] ) : ?>
                            <p class="me-srs-hindi"><?php echo esc_html( $card['hindi'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( $card['example'] ) : ?>
                            <p class="me-srs-example"><?php echo esc_html( $card['example'] ); ?></p>
                        <?php endif; ?>
                        <div class="me-srs-btns">
                            <button class="me-srs-btn me-srs-again" onclick="meSRS.rate('<?php echo esc_js( $card['id'] ); ?>', 'again', this)">🔄 Review Again</button>
                            <button class="me-srs-btn me-srs-good"  onclick="meSRS.rate('<?php echo esc_js( $card['id'] ); ?>', 'good',  this)">😄 Good</button>
                            <button class="me-srs-btn me-srs-easy"  onclick="meSRS.rate('<?php echo esc_js( $card['id'] ); ?>', 'easy',  this)">⭐ Easy!</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div id="me-srs-complete" style="display:none">
            <span style="font-size:60px">🎉</span>
            <h3>Session Complete!</h3>
            <p id="me-srs-complete-msg">You reviewed all cards. Come back tomorrow for your next session.</p>
            <button onclick="meSRS.restart()" class="me-srs-restart-btn">Review Again</button>
        </div>

    </div>

    <script>
    var meSRSConfig = {
        isLoggedIn : '<?php echo $is_logged_in; ?>',
        ajaxurl    : '<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>',
        nonce      : '<?php echo wp_create_nonce( "me_srs_nonce" ); ?>'
    };
    </script>
    <?php
    return ob_get_clean();
}


/**
 * Enqueue SRS assets
 */
add_action( 'wp_enqueue_scripts', 'me_enqueue_srs_assets' );
function me_enqueue_srs_assets() {
    global $post;
    if ( ! is_a( $post, 'WP_Post' ) || ! has_shortcode( $post->post_content, 'me_flashcards' ) ) {
        return;
    }
    wp_enqueue_script(
        'me-srs',
        get_stylesheet_directory_uri() . '/assets/srs.js',
        array(), '1.0.0', true
    );
    
}
// ─── Vocabulary Word CPT ───────────────────────────────────────────────────
function me_register_vocabulary_cpt() {

  register_post_type( 'vocabulary_word', array(
    'labels' => array(
      'name'               => 'Vocabulary Words',
      'singular_name'      => 'Vocabulary Word',
      'add_new_item'       => 'Add New Word',
      'edit_item'          => 'Edit Word',
      'search_items'       => 'Search Words',
      'not_found'          => 'No words found',
      'menu_name'          => 'Vocabulary',
    ),
    'public'              => false,   // No front-end single-post URLs
    'publicly_queryable'  => false,   // Cannot be queried via URL
    'show_ui'             => true,    // Visible in WP admin
    'show_in_menu'        => true,    // Shows as its own menu item
    'show_in_rest'        => true,    // Enables block editor
    'supports'            => array( 'title', 'editor', 'custom-fields' ),
    'menu_icon'           => 'dashicons-book-alt',
    'rewrite'             => false,   // No rewrite rules needed
  ) );

  // ─── Vocabulary Deck Taxonomy ──────────────────────────────────────────────
  register_taxonomy( 'vocabulary_deck', 'vocabulary_word', array(
    'labels' => array(
      'name'              => 'Vocabulary Decks',
      'singular_name'     => 'Deck',
      'add_new_item'      => 'Add New Deck',
      'edit_item'         => 'Edit Deck',
      'search_items'      => 'Search Decks',
      'not_found'         => 'No decks found',
      'menu_name'         => 'Decks',
    ),
    'public'            => false,   // No archive URLs (e.g. /vocabulary_deck/meeting-verbs/)
    'show_ui'           => true,    // Manageable in admin
    'show_in_rest'      => true,    // Block editor support
    'hierarchical'      => false,   // Flat tags, not parent/child categories
    'rewrite'           => false,
  ) );
}
add_action( 'init', 'me_register_vocabulary_cpt' );
/**
 * ════════════════════════════════════════════════════════════════════
 * MANINDER ENGLISH — GRAMMAR SYSTEM ADDITIONS
 * Add ALL of this to the BOTTOM of your existing functions.php
 * ════════════════════════════════════════════════════════════════════
 *
 * What this does:
 * 1. Registers a `grammar_lesson` custom post type → /grammar/[topic]/[slug]/
 * 2. Registers a `grammar_topic` taxonomy (Tenses, Modals, Articles…)
 * 3. Routes grammar_lesson posts to page-grammar-single.php
 * 4. Enqueues grammar lesson JS only on grammar lesson pages
 *
 * AFTER adding this code:
 * → Go to Settings → Permalinks → click Save Changes (flushes rewrite rules)
 * ════════════════════════════════════════════════════════════════════
 */


// ── 1. GRAMMAR LESSON CPT ──────────────────────────────────────────────────────
add_action( 'init', 'me_register_grammar_cpt' );
function me_register_grammar_cpt() {

    // Grammar Topic taxonomy — registered FIRST so CPT can reference it
    register_taxonomy( 'grammar_topic', 'grammar_lesson', array(
        'label'             => 'Grammar Topic',
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array(
            'slug' => 'gl',
            'with_front'   => false,
            'hierarchical' => true,
        ),
    ) );

    // Grammar Difficulty taxonomy (Beginner / Intermediate / Advanced)
    register_taxonomy( 'grammar_level', 'grammar_lesson', array(
        'label'             => 'Difficulty',
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'grammar-level', 'with_front' => false ),
    ) );

    // Grammar Lesson CPT
    register_post_type( 'grammar_lesson', array(
        'labels' => array(
            'name'               => 'Grammar Lessons',
            'singular_name'      => 'Grammar Lesson',
            'add_new_item'       => 'Add New Grammar Lesson',
            'edit_item'          => 'Edit Grammar Lesson',
            'menu_name'          => 'Grammar Lessons',
        ),
        'public'            => true,
        'has_archive'       => false,        // Archive handled by page-grammar-hub.php
        'supports'          => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
        'show_in_rest'      => true,         // Enables Gutenberg editor
        'taxonomies'        => array( 'grammar_topic', 'grammar_level' ),
        'menu_icon'         => 'dashicons-welcome-learn-more',
        'rewrite' => array(
   'slug' => 'gl',
    'with_front'   => false,
),
    ) );
}
add_action( 'init', 'me_add_grammar_rewrite_rules' );
function me_add_grammar_rewrite_rules() {
    add_rewrite_rule(
        'gl/([^/]+)/([^/]+)/?$',
        'index.php?grammar_lesson=$matches[2]&grammar_topic=$matches[1]',
        'top'
    );
}

add_action( 'init', 'me_flush_rewrite_once' );
function me_flush_rewrite_once() {
    if ( get_option( 'me_rewrite_flushed' ) !== '3' ) {
        flush_rewrite_rules( true );
        update_option( 'me_rewrite_flushed', '3' );
    }
}
add_filter( 'post_type_link', 'me_grammar_lesson_permalink', 10, 2 );
function me_grammar_lesson_permalink( $post_link, $post ) {
    if ( $post->post_type !== 'grammar_lesson' ) return $post_link;
    $terms = get_the_terms( $post->ID, 'grammar_topic' );
    if ( $terms && ! is_wp_error( $terms ) ) {
       return home_url( 'gl/' . $terms[0]->slug . '/' . $post->post_name . '/' );
    }
  return home_url( 'gl/tenses/' . $post->post_name . '/' );
}

// ── 2. ROUTE grammar_lesson POSTS TO OUR CUSTOM TEMPLATE ──────────────────────
add_filter( 'single_template', 'me_grammar_lesson_template' );
function me_grammar_lesson_template( $template ) {
    if ( get_post_type() === 'grammar_lesson' ) {
        $custom = get_stylesheet_directory() . '/page-grammar-single.php';
        if ( file_exists( $custom ) ) {
            return $custom;
        }
    }
    return $template;
}


// ── 3. ENQUEUE GRAMMAR LESSON JS ONLY WHERE NEEDED ───────────────────────────
add_action( 'wp_enqueue_scripts', 'me_enqueue_grammar_assets' );
function me_enqueue_grammar_assets() {
    if ( is_singular( 'grammar_lesson' ) ) {
        // Lora serif for pull quotes (already loaded in lesson-single, add here too)
        wp_enqueue_style(
            'me-lora',
            'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400;1,600&display=swap',
            array(), null
        );
    }
}


// ── 4. GRAMMAR HUB SHORTCODE [me_grammar_hub] ────────────────────────────────
// Use this on the /grammar/ page to auto-list all grammar topics + lessons
// The Grammar page template (page-grammar-hub.php) uses this shortcode.
add_shortcode( 'me_grammar_hub', 'me_grammar_hub_shortcode' );
function me_grammar_hub_shortcode() {

    // Get all grammar_topic terms that have lessons
    $topics = get_terms( array(
        'taxonomy'   => 'grammar_topic',
        'hide_empty' => true,
        'orderby'    => 'menu_order',
        'order'      => 'ASC',
    ) );

    if ( is_wp_error( $topics ) || empty( $topics ) ) {
        return '<p style="color:#888;padding:40px 0;">Grammar lessons coming soon. Check back shortly.</p>';
    }

    ob_start();
    foreach ( $topics as $topic ) {

        // Get lessons in this topic
        $lessons = get_posts( array(
            'post_type'      => 'grammar_lesson',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'tax_query'      => array( array(
                'taxonomy' => 'grammar_topic',
                'field'    => 'term_id',
                'terms'    => $topic->term_id,
            ) ),
        ) );

        if ( empty( $lessons ) ) continue;

        $count = count( $lessons );
        ?>
        <div class="gh-topic-block" id="topic-<?php echo esc_attr( $topic->slug ); ?>">
          <div class="gh-topic-header">
            <div class="gh-topic-meta">
              <span class="gh-topic-eye"><?php echo esc_html( strtoupper( $topic->name ) ); ?></span>
              <span class="gh-topic-count"><?php echo $count; ?> lesson<?php echo $count !== 1 ? 's' : ''; ?></span>
            </div>
            <h2 class="gh-topic-title"><?php echo esc_html( $topic->name ); ?></h2>
            <?php if ( $topic->description ) : ?>
            <p class="gh-topic-desc"><?php echo esc_html( $topic->description ); ?></p>
            <?php endif; ?>
          </div>

          <div class="gh-lessons-grid">
            <?php foreach ( $lessons as $i => $lesson ) :
                $levels    = get_the_terms( $lesson->ID, 'grammar_level' );
                $level     = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : 'All Levels';
                $excerpt   = get_the_excerpt( $lesson );
                $read_time = get_post_meta( $lesson->ID, '_me_read_time', true ) ?: '5 min';
            ?>
            <a href="<?php echo get_permalink( $lesson ); ?>" class="gh-lesson-card fade" style="--delay:<?php echo $i * 0.07; ?>s">
              <div class="gh-lc-top">
                <span class="gh-lc-num"><?php printf( '%02d', $i + 1 ); ?></span>
                <span class="gh-lc-level"><?php echo esc_html( $level ); ?></span>
              </div>
              <h3 class="gh-lc-title"><?php echo esc_html( $lesson->post_title ); ?></h3>
              <?php if ( $excerpt ) : ?>
              <p class="gh-lc-desc"><?php echo esc_html( $excerpt ); ?></p>
              <?php endif; ?>
              <div class="gh-lc-footer">
                <span class="gh-lc-time">⏱ <?php echo esc_html( $read_time ); ?> read</span>
                <span class="gh-lc-arrow">→</span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php
    }

    return ob_get_clean();
}


// ── 5. CUSTOM META BOX FOR GRAMMAR LESSON METADATA ───────────────────────────
// Adds fields: Read Time, Lesson Number, YouTube URL, Hindi Subtitle
add_action( 'add_meta_boxes', 'me_grammar_meta_boxes' );
function me_grammar_meta_boxes() {
    add_meta_box(
        'me_grammar_lesson_meta',
        'Lesson Details',
        'me_grammar_meta_box_html',
        'grammar_lesson',
        'side',
        'high'
    );
}

function me_grammar_meta_box_html( $post ) {
    wp_nonce_field( 'me_grammar_lesson_meta', 'me_grammar_lesson_meta_nonce' );
    $read_time    = get_post_meta( $post->ID, '_me_read_time',       true );
    $lesson_num   = get_post_meta( $post->ID, '_me_lesson_number',   true );
    $youtube_url  = get_post_meta( $post->ID, '_me_youtube_url',     true );
    $hindi_sub    = get_post_meta( $post->ID, '_me_hindi_subtitle',  true );
    $quiz_count   = get_post_meta( $post->ID, '_me_quiz_count',      true );
    ?>
    <p style="margin-bottom:12px">
      <label style="font-weight:600;display:block;margin-bottom:4px">Lesson Number</label>
      <input type="number" name="me_lesson_number" value="<?php echo esc_attr( $lesson_num ); ?>" style="width:100%" placeholder="1">
    </p>
    <p style="margin-bottom:12px">
      <label style="font-weight:600;display:block;margin-bottom:4px">Read Time</label>
      <input type="text" name="me_read_time" value="<?php echo esc_attr( $read_time ); ?>" style="width:100%" placeholder="7 min">
    </p>
    <p style="margin-bottom:12px">
      <label style="font-weight:600;display:block;margin-bottom:4px">Quiz Questions Count</label>
      <input type="number" name="me_quiz_count" value="<?php echo esc_attr( $quiz_count ); ?>" style="width:100%" placeholder="6">
    </p>
    <p style="margin-bottom:12px">
      <label style="font-weight:600;display:block;margin-bottom:4px">YouTube Video URL</label>
      <input type="url" name="me_youtube_url" value="<?php echo esc_attr( $youtube_url ); ?>" style="width:100%" placeholder="https://youtu.be/...">
    </p>
    <p style="margin-bottom:0">
      <label style="font-weight:600;display:block;margin-bottom:4px">Hindi Subtitle (shown below main title)</label>
      <input type="text" name="me_hindi_subtitle" value="<?php echo esc_attr( $hindi_sub ); ?>" style="width:100%" placeholder="Hindi mein likho...">
    </p>
    <?php
}

add_action( 'save_post_grammar_lesson', 'me_save_grammar_lesson_meta' );
function me_save_grammar_lesson_meta( $post_id ) {
    if ( ! isset( $_POST['me_grammar_lesson_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['me_grammar_lesson_meta_nonce'], 'me_grammar_lesson_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        '_me_lesson_number'  => 'me_lesson_number',
        '_me_read_time'      => 'me_read_time',
        '_me_quiz_count'     => 'me_quiz_count',
        '_me_youtube_url'    => 'me_youtube_url',
        '_me_hindi_subtitle' => 'me_hindi_subtitle',
    );

    foreach ( $fields as $meta_key => $post_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
        }
    }
}
