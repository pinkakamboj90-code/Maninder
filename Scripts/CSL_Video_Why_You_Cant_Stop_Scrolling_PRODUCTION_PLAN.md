# CSL Video — Full Production & Editing Plan

## "Why You Can't Stop Scrolling — Even When You're Bored of It"

**Channel:** Cognitive Strategy Lab (CSL)
**Companion script:** `CSL_Video_Why_You_Cant_Stop_Scrolling.md` (already written — voiceover-ready)
**This document:** Everything that happens *after* the script — voiceover, asset build, After Effects step-by-step, Premiere assembly, sound, colour, export, thumbnail.
**Your level:** Intermediate After Effects + Premiere Pro. Beginner YouTuber (this is video #1).
**Target audience:** USA, UK, Canada, Australia — English-speaking, 18–40, the "I know I scroll too much" crowd.
**Final runtime target:** 10:30–11:30.

> **How to read this doc.** Work top to bottom the first time. After that, the two sections you'll live in are **PART 4 (scene-by-scene AE build)** and **PART 5 (reusable technique library)**. Everything in PART 4 refers back to a technique in PART 5 so you're never re-learning the same move twice. Build the PART 5 templates *once*, reuse them all video.

---

# PART 0 — THE 30-SECOND SUMMARY (READ THIS FIRST)

You are making a **motion-graphics explainer**, not a stock-footage montage. That single decision is what separates premium faceless channels (Veritasium, Johnny Harris, RyanGeorge-style explainer cuts, Pursuit of Wonder) from the thousands of generic AI-voice channels that got de-prioritised when YouTube cracked down on low-effort template videos in late 2025. Per current coverage, the 2026 recommendation system rewards **watch duration, session depth, and repeat visits over raw clicks** ([news.az on 2026 formats](https://news.az/news/best-content-formats-for-youtube-in-2026)). So our entire edit is engineered for *retention*, not for shock.

**Your pipeline:**
1. **Script** → already done.
2. **Voiceover (VO)** → record/generate first. The VO is the skeleton; everything is timed to it.
3. **Premiere Pro** → drop in VO, do the "radio edit," lock pacing, place placeholder cards.
4. **After Effects** → build each scene as its own composition. This is 70% of your work.
5. **Premiere Pro (again)** → import AE renders, assemble final timeline, J/L cuts, music, SFX, colour.
6. **Export** → master file + thumbnail + derivative clips.

**The one rule that makes it look premium:** *every motion eases.* Nothing moves at constant speed. You will press **F9 (Easy Ease)** and open the **Graph Editor** more than any other action in this entire project. Linear keyframes are the #1 thing that makes hobby edits look like hobby edits.

---

# PART 1 — PRODUCTION OVERVIEW & SETUP

## 1.1 Technical specs (set these once, never touch again)

| Setting | Value | Why |
|---|---|---|
| Resolution | 3840 × 2160 (4K UHD) | Export 4K even for a 1080p channel — YouTube gives 4K uploads a higher bitrate, so your 1080p viewers actually see *less* compression. Future-proofs the channel. |
| Frame rate | 24 fps | Cinematic, calmer feel. Matches the "calm friend who knows neuroscience" tone better than 30/60. Lock it and never mix. |
| Aspect ratio | 16:9 | Standard horizontal. |
| Colour space | Rec. 709 / sRGB | Standard for web. Don't overthink HDR for video #1. |
| Audio | 48 kHz, stereo, target loudness **−14 LUFS** | −14 LUFS integrated is YouTube's normalisation target. Master to this and your video won't get turned down or pumped. |

**Working comp/sequence:** 3840×2160, 24fps. If 4K renders are too slow on your machine, work at 1920×1080 24fps instead — totally fine for video #1, just be consistent everywhere.

## 1.2 Which software does what

- **After Effects** = every shot that has motion graphics: title cards, the see-saw, the slot machine, graphs, the scrolling feed, icon animations, citation lower-thirds, kinetic text. Basically every visual the script describes in `[VISUAL: ...]` brackets.
- **Premiere Pro** = the spine. VO assembly, pacing, sequencing the AE renders in order, music, SFX, ducking, J/L cuts, final colour pass, export.
- **Photoshop (or Affinity/Figma)** = thumbnail + any static textures (paper texture for the newspaper collage, phone UI mockups).

> **Beginner trap to avoid:** Do NOT try to edit the whole video *inside* After Effects. AE is a compositor, not an editor — long timelines crawl. Build scenes in AE, render them, assemble in Premiere. This is exactly how the premium channels do it.

## 1.3 Folder structure (create this before you touch anything)

```
CSL_01_Scrolling/
├── 01_Script/                  (the .md script + a plain-text VO-only version)
├── 02_Voiceover/               (raw VO, cleaned VO, alt takes)
├── 03_Music_SFX/               (licensed tracks + sound effects, sorted)
├── 04_Assets/
│   ├── Fonts/
│   ├── Textures/               (paper, grain, vignette)
│   ├── Icons/                  (slot machine, phone, book, etc. — SVG)
│   └── Stock/                  (only if used — keep minimal)
├── 05_AfterEffects/
│   ├── _MASTER_TEMPLATES.aep   (your reusable rigs — PART 5)
│   ├── Scene_01_Hook.aep
│   ├── Scene_02_Problem.aep
│   └── ...one .aep per scene
├── 06_AE_Renders/              (ProRes/lossless exports from AE go here)
├── 07_Premiere/                (the master .prproj)
├── 08_Exports/                 (final master, thumbnail, reels)
└── 09_Thumbnail/
```

**Why one .aep per scene instead of one giant project:** if AE crashes (it will), you lose one scene, not everything. It also keeps RAM previews fast. Link them into Premiere via Dynamic Link *or* render each to ProRes — see PART 6.

## 1.4 The CSL visual language (your brand system — lock these)

Your existing scripts already define this. Codifying it here so every scene is consistent. **Consistency is what makes a channel feel "premium" more than any single fancy effect.**

**Colour palette:**
| Role | Colour | Hex | Usage |
|---|---|---|---|
| Background base | Dark navy | `#0B1A2C` | Every scene background. The channel's signature. |
| Primary accent | Gold | `#C9A84A` | Titles, key words, the "reward" moments, citations. |
| Alert / problem | Soft red | `#C94A4A` | Pain side of see-saw, the "deficit," warning beats. Use sparingly. |
| Text / neutral | Off-white | `#F2EEE5` | Body text, voiceover-synced words. Never pure #FFFFFF (too harsh on navy). |
| Muted / "boring" | Desaturated grey-blue | `#3A4A5C` | The forgettable feed posts, inactive states, de-emphasised UI. |

**Typography:**
- **Headings / title cards:** Cormorant Garamond (serif, editorial, gold). This is your "voice."
- **Body / labels / UI:** Montserrat or Inter (clean sans-serif, off-white).
- **Citations:** Montserrat, smaller, lower-third.

**Texture / mood:**
- A subtle **film grain** overlay on everything (PART 6) — kills the "flat digital" look instantly.
- A gentle **vignette** to pull the eye to centre.
- **Glow** only where it means something (the phone screen, the "reward" gold flashes).

**Motion personality:** slow, deliberate, eased. Things drift and settle. Nothing snaps or bounces hard (that reads as comedy/MrBeast, wrong for this niche). Think "expensive documentary," not "hype reel."

---

# PART 2 — PRE-PRODUCTION (do all of this before opening AE)

## 2.1 Voiceover — the foundation everything is timed to

You have two routes. For a faceless channel targeting US/UK, an **AI voice** is completely standard now and audiences accept it — *if* it's a premium voice and well-directed.

**Option A — AI voiceover (recommended for video #1):**
- Use a top-tier neural voice (ElevenLabs is the current quality leader for this niche; PlayHT and others are alternatives). Pick a **calm, mid-tone, neutral-English** voice — not over-energetic. Audition 4–5 voices reading your hook before committing; the voice IS your channel's identity, so choose deliberately.
- Match your script's voice direction: ~150–155 wpm, calm-friend tone.
- **Generate per paragraph/beat, not all at once.** This lets you regenerate one line without redoing everything, and gives clean split points.
- Insert the pauses your script calls for (after "you're not even enjoying it" hold 1s; after "stopping feels worse than continuing" hold 0.7s). In ElevenLabs use `<break time="1.0s" />` or just add the gap in Premiere.

**Option B — Your own voice:** If you ever want to record yourself, a USB condenser mic (or even good earbuds with a foam shield) in a soft-furnished room, recorded in Audacity/Adobe Audition. Keeps it 100% authentic. You can switch to this later once the channel grows.

**VO cleanup (either route):**
- Normalise to around −16 to −14 LUFS for the VO track alone (music sits under it).
- Light de-noise, a gentle high-pass filter at ~80 Hz to remove rumble, and a de-esser if sibilance is harsh.
- Export VO as one continuous WAV *and* keep the per-beat files.

## 2.2 Music — the emotional bed

Your script calls for "low piano + soft pad" that **drops out** for the see-saw and the 30-second check. So you need:
- **1 main ambient bed** — minimal, atmospheric, builds very slightly. Tension without drama.
- **1 slightly warmer/hopeful variant** for the "How to interrupt it" solution section (subtle lift in mood = signals "we're moving from problem to fix").
- Optional **1 darker/tension cue** for "somewhere darker" (the Mechanism Two intro at 4:30).

**Where to license (royalty-free, safe for monetisation):** Epidemic Sound, Artlist, Musicbed, Uppbeat (has a free tier). **Avoid** random "free" YouTube tracks — Content ID claims will demonetise video #1. Get a proper licence.

**Selection rule:** instrumental only, no melody that competes with the VO, nothing with a strong recognisable hook. The music is *weather*, not a *song*.

## 2.3 Sound effects (SFX) — the secret weapon of premium edits

This niche lives and dies on subtle sound design. You need a small, curated SFX kit:
- Soft UI "ticks"/"clicks" (for text appearing, see-saw tilts)
- Low "hums" / drones (for the baseline drifting down, tension)
- "Whoosh" transitions (sparingly — between major sections)
- A slot-machine reel spin + payout chime (Mechanism One)
- Phone notification "ding," pull-to-refresh swipe
- A deep "thud"/impact for emphasis beats
- Room-tone / silence (for the pull-back beats — see script)

**Sources:** Epidemic Sound SFX library, Artlist SFX, or free: freesound.org (check each licence). Keep them in `03_Music_SFX/SFX/` sorted by type.

## 2.4 Fonts & icons

- Install **Cormorant Garamond** and **Montserrat** (both free, Google Fonts) before opening AE so they're available.
- Source **clean line/flat icons as SVG** (slot machine, brain, phone, lever, book, mug, walking shoe, window, door, refresh arrow, autoplay, infinite-scroll loop). Use a consistent icon set so they share a style — Lucide, Phosphor, or Iconscout. SVGs import into AE and can be converted to editable shape layers (PART 5.7).

## 2.5 Master asset checklist (tick before AE)

- [ ] Final VO — one WAV + per-beat files, cleaned, leveled
- [ ] Main music bed (+ warm variant, + tension cue)
- [ ] SFX kit sorted
- [ ] Fonts installed (Cormorant Garamond, Montserrat)
- [ ] Icon set (SVGs) collected
- [ ] Paper texture + film grain + vignette overlay
- [ ] Phone UI mockup (a clean blank phone frame PNG — you'll fill the screen in AE)
- [ ] Colour palette saved as AE swatches / Premiere
- [ ] This plan open on a second screen

---

# PART 3 — PREMIERE PRO: THE SPINE & RETENTION ENGINEERING

You build the *structure* in Premiere first, then send scenes to AE, then come back to Premiere to finish. This section is the "first pass."

## 3.1 Project & sequence setup

1. New Project → name it `CSL_01_Scrolling_MASTER`. Save it in `07_Premiere/`.
2. New Sequence → use a 4K preset: 3840×2160, 24fps (or 1080p 24fps if you chose that). Name it `MASTER_TIMELINE`.
3. Set up your tracks with intent (label them by right-clicking the track header → Rename):
   - **V3** — Text/overlay safety (titles that live in Premiere, captions)
   - **V2** — AE renders (your motion graphics scenes)
   - **V1** — base / placeholders / b-roll
   - **A1** — Voiceover
   - **A2** — Music bed
   - **A3** — SFX
4. Import the full VO WAV onto **A1** starting at 00:00:01:00 (leave 1 second of black/silence head — gives breathing room and a clean start).

## 3.2 The "radio edit" (do this before any visuals)

This is the single most important pacing step and almost every beginner skips it.

1. With only the VO on the timeline, **listen to the whole thing start to finish.**
2. Cut the dead air, the awkward breaths, the lines that drag. Tighten the gaps between sentences. The script is written for ~150 wpm but real delivery always has slack.
3. Adjust the pause lengths to *feel* right, not just match the script numbers. The 1-second hold after "you're not even enjoying it" should feel slightly uncomfortable — that's the point.
4. When the audio-only version is gripping with your eyes closed, *then* you start visuals. If it's boring with eyes closed, no amount of motion graphics will save it.

> This is exactly the "read aloud, edit, repeat" discipline that script/VO professionals use ([Columbia CTL on script practice](https://ctl.columbia.edu/resources-and-technology/teaching-with-technology/diy-video/effective-videos/script-writing/)). Content rephrased for compliance.

## 3.3 Markers = your shot list

Once the radio edit is locked, walk the playhead through and drop a **marker (press `M`)** at the start of every `[VISUAL: ...]` beat from the script. Name each marker after the scene (e.g., "S01 Hook — bored face," "S05 See-saw intro"). Now you have a frame-accurate map of exactly how long each AE scene must be. Export the marker list (or screenshot it) — these durations drive your AE comp lengths. **Build AE comps to the marker durations so renders drop straight onto the timeline.**

## 3.4 The pacing map (retention architecture)

Modern retention guidance: hook in the first ~1.5 seconds, and aim to keep ~50% of viewers to the ~50% mark ([reelmind.ai on first 1.5s](https://reelmind.ai/blog/master-cinematic-transitions-after-effects-premiere-pro-secrets-for-viral-reels); [prism-me on retention targets](https://www.prism-me.com/blog/how-to-use-youtube-studio-to-get-more-views)). Here's how the script's structure maps to retention tactics:

| Time | Section | Retention tactic | Visual energy |
|---|---|---|---|
| 0:00–0:30 | Hook | Cold open, no logo, no intro. Visual hook on screen *before* the first word finishes. Open loop ("here's the exact mechanism"). | Low/eerie — stillness is the hook |
| 0:30–1:30 | The problem | Relatability + "brain rot" proof. Fast headline collage = energy spike to reward the viewer for staying. | Medium, rising |
| 1:30–4:30 | Mechanism One | New chapter card = "fresh start" signal. Slot-machine reveal is the eye-candy payoff. | Medium-high |
| 4:30–7:30 | Mechanism Two | "Somewhere darker" — tonal shift down. The see-saw is the hero visual. | Medium, heavier |
| 7:30–9:45 | The fix | Mood lifts (warm music variant). Clean checklist = sense of control. | Medium, brighter |
| 9:45–10:45 | Bigger point | Slow pull-back, emotional payoff, removes shame. | Low, intimate |
| 10:45–11:00 | CTA | Tease next video = session depth (the 2026 algorithm's favourite metric). | Low, branded |

**Chapter cards** ("MECHANISM ONE," etc.) double as retention tools: they act as mini "next episode" promises that reset attention. Keep them ~1 second.

## 3.5 Pattern interrupts (every 20–40 seconds)

The brain disengages from visual monotony. A *pattern interrupt* is any deliberate change that re-grabs attention. Plan one roughly every 20–40s. In this video they're built in:
- A title/chapter card
- Music dropping to silence (the see-saw beat, the 30-second check) — silence itself is a powerful interrupt against an overstimulated viewer ([internetvideomag on quiet as pattern interrupt](https://internetvideomag.com/how-to-make-internet-videos/the-rise-of-silent-hobby-videos-and-digital-decompression/))
- A colour shift (the red "deficit" moment against the navy)
- A camera move / scale punch-in
- A single sharp SFX after a stretch of soft bed

Mark these on the timeline too. If you go 45+ seconds with no change, add one.

## 3.6 J-cuts and L-cuts (the "invisible polish")

These make the edit feel professional and unbroken. A **J-cut** = the audio of the next scene starts *before* its picture; an **L-cut** = the current audio continues *over* the next picture ([no film school on essential cuts](https://nofilmschool.com/essential-cuts-every-video-editor-needs-know); [split edit definition](https://en.wikipedia.org/wiki/Split_edit)). Content rephrased for compliance.

**Where to use them here:**
- Let the VO line about the *next* idea begin while the *previous* visual is still settling → the viewer is pulled forward (J-cut).
- Let a line of VO carry *over* into the next scene's opening frames so cuts don't feel chopped (L-cut).
- Practically in Premiere: unlink (or use the track-targeting) so you can drag the audio edit point and video edit point to different frames. Offset them by 6–14 frames. Don't cut VO and visuals on the exact same frame for the whole video — that's what makes amateur edits feel "stiff."

## 3.7 Workflow handoff to After Effects

Two ways to get AE scenes into Premiere:
- **Dynamic Link** (right-click clip in Premiere → Replace With After Effects Composition, or import the .aep): live updates, no rendering, but heavier on playback and crash-prone on long timelines. Good while iterating.
- **Render to ProRes** (recommended for final): in AE, export each scene to **ProRes 422 HQ** (or ProRes 4444 if it has transparency to layer over something) into `06_AE_Renders/`, then import the .mov into Premiere. Rock-solid, fast playback. This is the pro default.

**Recommended hybrid:** Dynamic Link while you're still changing things; switch each scene to a rendered ProRes once it's locked. Keeps Premiere snappy for the final pass.

---

# PART 4 — SCENE-BY-SCENE AFTER EFFECTS BUILD

**How this section works.** Each scene below gives you: the goal, the comp setup, a numbered build sequence, and the **easing/sound** notes. Anything marked **→ [Tech X.X]** points to a reusable rig in PART 5 — build those once, then drop them in. Every comp is 3840×2160 (or 1080p), 24fps, built to the duration your Premiere marker told you.

**Global rules that apply to every single scene (memorise these):**
- Background is always a solid `#0B1A2C`. Add a faint **radial gradient** (Effect → Generate → Gradient Ramp, radial, slightly lighter navy in centre) so it's not dead-flat. This one move makes backgrounds look "designed."
- Every keyframe gets **Easy Ease (F9)** minimum. For hero moves, open the **Graph Editor** and pull the handles so motion starts slow, accelerates, then settles (an "S" curve in the value graph / a hump in the speed graph).
- Text and elements **never just pop on** — they fade + move slightly (rise 20–40px, or scale 95%→100%). → [Tech 5.5]
- Add a top **Adjustment Layer** in every comp reserved for grain + vignette, OR apply those once in Premiere globally (cleaner — see PART 6). Don't do both.
- Keep a **null object named `CAM_CTRL`** in scenes that move, and parent a camera or your layers to it for clean push-ins. → [Tech 5.8]

---

## SCENE 01 — HOOK [0:00–0:30]
*"You picked up your phone to check one thing…"*

**Goal:** Eerie stillness. A bored face lit only by phone glow, thumb scrolling, clock jumping from 9:14 to 9:54. End on the gold title card. This is the most important 30 seconds of the video — it decides retention.

**Asset approach (faceless-friendly):** You are NOT filming a face. Three premium options, easiest → best:
1. **Silhouette/shadow:** a dark profile shape (shape layer or cut-out) with only the underside of the chin/cheek catching the phone's glow. Most on-brand and easiest.
2. **AI still image** of a face lit by phone glow (generate one, keep it dim and abstract), brought to life with subtle parallax. → [Tech 5.9 — 2.5D parallax]
3. **Licensed stock** close-up of a face/phone glow, heavily graded to navy.

Recommend option 1 or 2 for uniqueness.

**Build sequence:**
1. New comp `S01_Hook`, duration = your marker length (~30s).
2. Background solid `#0B1A2C` + radial Gradient Ramp.
3. Bring in the face element (silhouette/AI still). Position lower-third, mostly in shadow.
4. **Phone glow:** new shape layer, a soft rectangle in `#C9A84A`/cool white, heavy **Fast Box Blur** (~80–150), Opacity ~25%, blend mode **Add** or **Screen**. Place it where the phone would be, lighting the chin. Animate a *very* subtle Opacity flicker with expression `wiggle(2, 6)` on Opacity so the glow "breathes" like a screen refreshing. → [Tech 5.6 glow]
5. **The thumb scroll:** a small thumb shape (or part of the silhouette) that moves up ~30px and resets, looped. Position keyframes + `loopOut("cycle")` expression. Keep it slow and mechanical — dead-eyed, not lively.
6. **The clock:** a Text layer top-corner, Montserrat, dim grey `#3A4A5C`. Shows `9:14 PM`. At the script beat ("Forty minutes later"), do a quick **glitch/cut** to `9:54 PM` → [Tech 5.10 glitch]. The jump in time with no other change = the unsettling point.
7. **Slow zoom on the eyes** ("you're not even enjoying it"): push the camera/CAM_CTRL in from 100% to ~115% over 4–5s, heavily eased. → [Tech 5.8]
8. **Hold beat:** after "you're not even enjoying it," everything goes still for 1 full second. No motion. Let it sit (matches the script's VO pause).
9. **Title card** ("WHY CAN'T YOU STOP?"): the face dims to near-black, gold serif text (Cormorant Garamond) fades up centre with a slow 102%→100% scale settle. Hold 1s. → [Tech 5.5 / 5.3]

**Easing/sound:** Near-silence here. A low room-tone/drone bed only. One soft "tick" when the clock jumps. The glow flicker has no sound. Let the quiet do the work — it's your first pattern interrupt against the viewer's overstimulated brain.

---

## SCENE 02 — THE PROBLEM [0:30–1:30]
*Brain rot, the midnight Google search, the bored-but-scrolling face.*

**Goal:** Relatability + credibility. Energy lifts here to reward the viewer for surviving the slow hook.

### 2A — "Brain rot" headline collage
1. New comp `S02_BrainRot`.
2. Create 4–6 **fake-but-plausible newspaper/headline cards** (build in AE as text on light `#F2EEE5` panels with a subtle **paper texture** layer set to Multiply, ~15% opacity). Headline: "Oxford Word of the Year 2024: Brain Rot." Vary mastheads generically (don't fake real logos precisely — keep them stylised to avoid trademark issues).
3. Animate them in a **quick-cut montage**: each card scales in from 103%, slight rotation (±2°), fades, then hard-cuts to the next on the beat of the VO. 4–6 frames each = energetic. → [Tech 5.5]
4. Optional: a faint **halftone/print dot** texture over the whole collage to sell "newspaper."

### 2B — Search bar autocomplete
1. New comp `S02_Search`. Build a clean search bar: rounded rectangle (`#3A4A5C` stroke on navy), a magnifier icon, a text cursor.
2. **Type-on effect** for "why can't I stop scrolling…" → use a text layer with the **Typewriter** animation preset (Effects & Presets → Animation Presets → Text → Animate In → Typewriter) OR animate the Range Selector **End** from 0% to 100%. → [Tech 5.4 type-on]
3. Then show the **autocomplete dropdown** populating with variations ("…when I'm bored," "…at night," "…even though I hate it") — each row fades + slides up 15px, staggered 3 frames apart. → [Tech 5.5]
4. Add a slow blinking cursor: a thin rectangle, Opacity 100/0 hold-keyframes every 0.5s, or expression `Math.round(time*2)%2*100`.

### 2C — Irritated scrolling face + two-mechanism setup
1. Reuse the SCENE 01 face element, now with a small sigh/irritation cue (a subtle downward shift of the brow shape, or just hold on the dead-eyed glow).
2. **Two icons fade in side by side** — a slot machine (left) and a brain (right), labelled "Mechanism 01 / Mechanism 02." Each icon: from SVG → editable shapes → [Tech 5.7], scale-in with stagger, gold accent on a navy rounded card.
3. These two cards are a **visual promise** (open loop). They'll "activate" one at a time in the next sections — so design them as reusable, and revisit them.

**Sound:** soft paper "whoosh"/shuffle on the headline cuts; keystroke ticks on the type-on; a clean "set" tone when the two mechanism cards land.

---

## SCENE 03 — MECHANISM ONE: VARIABLE REWARDS [1:30–4:30]
*B.J. Fogg, the slot machine, pull-to-refresh, the dopamine-of-anticipation.*

This is your first big eye-candy section. The slot machine is the centrepiece.

### 3A — Chapter card
"MECHANISM ONE: VARIABLE REWARDS" — gold serif, full-screen, on navy. Letters fade/rise in a slight stagger, hold ~1s, then push back/scale down to make room for content. → [Tech 5.3 chapter card]

### 3B — Fogg / Stanford
1. A simple **Stanford campus line-illustration** (single-line/outline style in gold on navy — keep it iconographic, not a photo). Animate with **Trim Paths** so the building "draws on." → [Tech 5.2 draw-on]
2. **Citation card** lower-third: "B.J. Fogg — Stanford Persuasive Technology Lab." → [Tech 5.11 citation lower-third]. Hold 2s, fade.

### 3C — The Fogg Behaviour Model (3 stacked icons)
"Motivation, ability, prompt — clicking together." Three labelled icons stack and lock with a small scale-punch on each as it lands (102%→100%, eased hard). A subtle "click" SFX per icon. → [Tech 5.7 + 5.5]

### 3D — THE SLOT MACHINE (hero build) → [Tech 5.12 slot machine rig]
1. Build the slot machine body once (PART 5.12). Place it centre.
2. **Lever pull:** the lever rotates down ~30° (eased), reels start spinning.
3. **Reels spin:** vertical strips of symbols looping fast via expression, then **decelerate to a stop** one by one (left, middle, right) with eased keyframes — the classic slot rhythm.
4. **Payout vs nothing:** mostly the reels stop on "nothing" (grey symbols). Occasionally they line up gold = a flash + chime. This visually *is* the variable reward.

### 3E — Variable-ratio explanation
1. **"A reward every time = boring":** show a row of identical gold coins appearing predictably, then **desaturating to grey** (Effect → Hue/Saturation, animate Master Saturation down) to show habituation.
2. **"A reward sometimes = addictive":** show an irregular pattern — mostly grey, random gold — with the gold ones triggering a tiny dopamine "spark." This contrast is the core teaching image.
3. Label the term **"VARIABLE RATIO REINFORCEMENT"** as kinetic text — key words in gold. → [Tech 5.5]

### 3F — Slot machine morphs into a phone → [Tech 5.13 morph]
The script's signature transition. The slot machine body **reshapes into a phone**: reels become a scrolling feed, the lever becomes a thumb pulling down to refresh. Done with shape-layer path keyframes (matched vertex counts) or a scale/cross-dissolve cheat if path-morph is too advanced. Either way, eased and ~1.5s. **This is the "wow" moment of the section — spend time here.**

### 3G — The scrolling feed (grey with gold flashes) → [Tech 5.14 feed rig]
1. A tall column of feed "cards" (rounded rectangles) that scrolls upward continuously (Position + `loopOut`).
2. Most cards muted `#3A4A5C`. Every ~8th–10th card flashes `#C9A84A` for a few frames (the "yes" moment). Drives the "most posts are nothing" point home.

### 3H — Graphs (engagement vs predictability; two dopamine peaks)
1. **"Engagement vs reward predictability"** line graph peaking at "unpredictable, occasional." → [Tech 5.1 animated graph]
2. **Two dopamine peaks side by side:** "Receiving reward" (smaller bump) vs "Expecting reward" (larger bump). Animate the curves drawing on with Trim Paths; label each; the *anticipation* peak grows taller to land the point. → [Tech 5.1]

### 3I — Three design patterns
"Pull-to-refresh, autoplay, infinite scroll" — three icons labelled "slot 1, slot 2, slot 3," each tied back to slot-machine mechanics with a quick callback animation (a tiny reel-spin behind each). → [Tech 5.7]

**Transition out:** "we have to go somewhere darker" — fade the gold warmth out, push the navy darker, drop the music a notch. Sets up the tonal shift.

**Sound:** the slot machine carries this section — reel spin loop, mechanical lever clunk, payout chime on gold. Keep the chime *rewarding* the first time, then slightly hollow/flat on repeats (sound-designing the habituation point).

---

## SCENE 04 — MECHANISM TWO: THE DOPAMINE DEBT [4:30–7:30]
*Anna Lembke, the pleasure/pain see-saw, the deficit spiral. The emotional core.*

The **see-saw is the spine of the whole video** (your script says so). Build it as a reusable rig → [Tech 5.15 see-saw rig] and reuse it for every dopamine mention here and anywhere later.

### 4A — Chapter card + Lembke citation
"MECHANISM TWO: THE DOPAMINE DEBT" gold serif. Then citation lower-third "Anna Lembke — Stanford School of Medicine." → [Tech 5.3 + 5.11]

### 4B — Introduce the see-saw (balanced)
1. Drop in the **see-saw rig**. "Pleasure" on one side, "Pain" on the other, centred and level.
2. Establish it calmly — this is the model the viewer must trust. Slow fade-in, a gentle settle wobble (one tiny eased oscillation) so it feels physical.

### 4C — The balance mechanic (the teaching beat)
1. **Pleasure hit:** dopamine releases → see-saw **tilts toward pleasure** (rotate the beam, eased). A small gold spark on the pleasure side.
2. **Compensation:** "the brain tilts the other way" → see-saw **rebounds past level toward pain** (rotate opposite, slight overshoot). Pain side glows soft red `#C94A4A`.
3. **The dip after the hit:** cut to the face — "eyes drop, expression flattens, thumb reaches." Reuse the SCENE 01 face.
4. **Repeat & accelerate:** "do that a thousand times" → the see-saw oscillates **faster and faster** (use a `wiggle`-driven or sine-expression rotation that ramps up via a slider) then **stays tilted toward pain** (rotation eases to and holds at the pain side). → [Tech 5.15]

### 4D — Baseline drifts down
1. **Two graphs side by side:** "Healthy baseline" (a level line) vs "Dopamine deficit" (a line sloping down). Animate the deficit line drawing downward. → [Tech 5.1]
2. Label **"DOPAMINE DEFICIT STATE"** in red kinetic text.

### 4E — The two doors
"Keep scrolling (numb)" vs "Put it down (worse for now)." Two simple door icons; the hand/cursor reaches for the first. The chosen door gets a subtle highlight; the better door dims. Quick, clear, symbolic. → [Tech 5.7]

### 4F — The spiral
"Each scroll digs the spiral one notch deeper." A spiral path (build with a spiral shape or repeater) that **draws inward/downward** via Trim Paths, each notch syncing to the VO. End on the spiral pulling the eye into darkness — strong transition into the solution. → [Tech 5.2]

**Sound:** music **drops out** during the core see-saw explanation (your script's instruction). One soft "click" as the see-saw tilts; a low "hum" as the baseline drifts down. Let silence carry the emotional weight. Bring a low tension drone under the spiral.

---

## SCENE 05 — THE INTERRUPT PROTOCOL [7:30–9:45]
*Four fixes: friction, the 30-second check, tolerate the dip, replace the loop.*

Mood lifts here. **Switch to the warmer music variant.** Brighter navy, more gold, cleaner layouts. This section should feel like *control returning*.

### 5A — Title card
"THE INTERRUPT PROTOCOL" gold serif. Below it, four faint numbered slots (1–4) that will fill in as each fix is covered (a progress device that rewards watching). → [Tech 5.3]

### 5B — Fix One: Add friction
1. A clean **phone home screen** mockup (rounded rectangle screen, grid of app icons).
2. **Animate the friction:** the "worst app" icon gets **dragged off the home screen into a folder labelled 'Time'** (Position keyframes, eased, with a slight scale-down as it drops in). Notification badges **fade to grey**. → [Tech 5.16 phone UI]
3. Key word "FRICTION" in gold kinetic text.

### 5C — Fix Two: The 30-second check
1. A **still phone screen**, a small clock ticking 30 seconds (animate a circular progress stroke around a 30 counter → [Tech 5.1 radial]).
2. The question appears as text: *"Am I actually enjoying this?"* — typed on, held. → [Tech 5.4]
3. **Music drops to silence here** (pattern interrupt) so the question lands. The thumb is held still.

### 5D — Fix Three: Tolerate the dip
1. **"Mood after cutting back" graph:** dips for the first 7 days, then climbs **above** the original baseline. Animate the line drawing across; mark "Day 7–10 — baseline lifts" in gold. → [Tech 5.1]
2. This is the most-shared idea — make the graph clean and screenshot-worthy (think shareable infographic frame).

### 5E — Fix Four: Replace the slot machine
1. A phone icon sits in several "time slots" (after dinner, queue, before sleep).
2. Each phone icon **swaps for a guaranteed-reward icon**: book, walking shoe, mug, window. Cross-dissolve + scale settle per swap. → [Tech 5.7]
3. Callback: a tiny dimmed slot machine vs a steady gold dot = "variable vs predictable reward."

**Sound:** warmer bed returns after the silent 30-second beat. Soft, satisfying "set"/"lock" ticks as each of the four protocol slots fills in. Each completed fix = a small positive tone (reward the learning).

---

## SCENE 06 — THE BIGGER POINT [9:45–10:45]
*Removing the shame. The emotional resolution.*

**Goal:** Intimacy. Slow everything down. This is where the viewer decides to subscribe — because you made them feel *understood*, not lectured.

1. **Slow pull-back:** the phone sits on a table, screen dark, room quiet. Start tight, ease out to a wide, still frame. → [Tech 5.8 / 5.9]
2. Reuse the **opening face** — but now **eyes lifted, not on the phone** (the bookend payoff). Even a subtle change (the glow fading from the chin, head lifting a few degrees) closes the emotional loop.
3. As the VO dissolves the shame, bring the **four interventions back as a clean checklist**, each ticking on with a soft check animation. → [Tech 5.5]
4. Keep motion minimal — let the words carry it. One slow, eased push-in on the checklist at most.

**Sound:** near-silence on the pull-back (script says let the visual breathe). A single warm pad swell as the checklist completes. No SFX clutter.

---

## SCENE 07 — CTA / END SCREEN [10:45–11:00]
1. **Channel branding:** "COGNITIVE STRATEGY LAB" in serif gold animates in (your logo stinger — build it once, reuse every video). → [Tech 5.3]
2. **Tease next video** ("why you're exhausted at the end of a day where you didn't actually do anything") — show a teaser frame/title to drive **session depth** (the 2026 algorithm's priority).
3. **End screen:** leave the last ~5 seconds on a clean, low-motion frame with space for YouTube's two end-screen elements (one suggested video box + a subscribe element). Don't put busy graphics where the end-screen cards will sit — design the layout around them.

**Sound:** soft outro bed, resolve gently. One final subtle logo "tone."

---

# PART 5 — REUSABLE AFTER EFFECTS TECHNIQUE LIBRARY

Build each of these **once** in `_MASTER_TEMPLATES.aep`, then copy/paste the layers (or save as Animation Presets) into each scene. This is how pros stay fast and consistent. Steps assume intermediate familiarity (you know what a pre-comp, null, parent, track matte, and the Graph Editor are).

> **Plugins:** everything here is doable with **stock After Effects** — no paid plugins required. Where a plugin makes life easier, it's noted as optional (Saber is free; Optical Flares/Newton are paid and optional). Keep video #1 plugin-light.

---

## 5.1 — Animated graphs (line, bar, radial)
Used in: dopamine peaks, engagement curve, baseline graphs, mood graph, 30-sec radial.

**Line graph (draw-on):**
1. Pen tool → draw the line path on a new **Shape Layer** (no fill, stroke `#C9A84A`, width ~8–12px, rounded caps).
2. Add **Trim Paths** (layer → Add → Trim Paths). Keyframe **End** 0% → 100%. F9 both keyframes. The line "draws on."
3. Open Graph Editor → make the End curve ease in and out (slow start, slow finish).
4. **Axes:** a separate shape layer, thin grey `#3A4A5C` lines, drawn on slightly *before* the data line.
5. **Labels:** Montserrat text, fade+rise in after the line reaches them. → [5.5]
6. **Moving dot:** a small circle parented to a path via "Create Nulls From Paths" → Trace Path, or simply keyframe a dot along the line to lead the draw-on.

**Bar graph (the two dopamine peaks / comparison bars):**
1. Rectangle shape, anchor point at the **bottom** (so it grows up). Set anchor by Pan-Behind tool `Y`, snap to base.
2. Keyframe **Scale Y** 0% → 100% (or the rectangle's Size property). F9, then Graph Editor for an eased "grow."
3. Add a slight **overshoot** for the taller "anticipation" bar (scale to 104% then settle to 100%) so it feels alive and emphasises the point.

**Radial progress (30-second clock):**
1. Ellipse shape, no fill, stroke gold, rounded cap.
2. Add **Trim Paths**, keyframe **End** 0→100% over your 30s (or compressed).
3. Rotate the layer −90° so it starts at 12 o'clock.
4. Centre a Text layer counting down; animate via a Slider + expression, or hold-keyframe the numbers.

---

## 5.2 — Draw-on with Trim Paths
Used in: Stanford illustration, the spiral, any line art.
1. Bring SVG/path in → convert to shape (right-click → Create Shapes from Vector Layer). → [5.7]
2. On the shape group add **Trim Paths**. Keyframe **End** 0→100%.
3. If multiple paths and you want them to draw sequentially, set **Trim Multiple Shapes → Sequentially**.
4. Ease (F9) + Graph Editor. Add a soft "draw" whoosh SFX synced to the motion.
5. **Spiral specifically:** use a spiral path (or a circle with a wiggly-tapered stroke), Trim Paths End 0→100%, plus a slow Rotation, plus a slight scale-down to "pull inward."

---

## 5.3 — Title / chapter cards & logo stinger
Used in: hook title, all "MECHANISM" cards, "INTERRUPT PROTOCOL," CTA branding.
1. Text layer, **Cormorant Garamond**, gold `#C9A84A`, centred.
2. Reveal: combine **fade (Opacity 0→100)** + **scale settle (102%→100%)** + optional per-character stagger via a Text Animator (Animate → Opacity, Range Selector, offset the Start). → [5.5]
3. Hold ~1s.
4. Exit: scale down slightly + fade, OR push back in Z if you're using a camera.
5. Add a thin gold underline that **draws on** with Trim Paths under the title for an editorial touch.
6. **Logo stinger (build once, every video):** "COGNITIVE STRATEGY LAB" with a small geometric mark; animate the mark drawing on + text fading up + a subtle light sweep. Save the whole comp; reuse forever.

---

## 5.4 — Type-on / typewriter
Used in: search autocomplete, the 30-second question.
- **Easy way:** select text layer → Effects & Presets → Animation Presets → **Text > Animate In > Typewriter**. Drag onto layer; adjust the two keyframes' timing.
- **Manual (more control):** Text → Animate → **add Range Selector**, animate **End/Start** of the selector while the property is set so characters reveal. Set Range Selector "Units = Index" to reveal character by character.
- Add a **blinking cursor** (thin rectangle): Opacity expression `Math.round(time*2)%2*100`.
- Sync subtle **keystroke ticks** in Premiere.

---

## 5.5 — The "fade + rise" reveal & kinetic text stagger (your house style)
This is the single most-used animation in the whole video. Make it a preset.
1. Layer → set two keyframes 8–12 frames apart:
   - **Position:** start +30px below final, end at final.
   - **Opacity:** 0 → 100.
   - (Optional **Scale:** 96 → 100.)
2. Select all keyframes → **F9**. Open Graph Editor → pull into a soft ease-out (fast in, gentle settle).
3. Save as **Animation Preset** (right-click selected properties → Save Animation Preset) named `CSL_FadeRise`. Now one click applies it anywhere.
4. **Kinetic word emphasis:** for lines where key words pop in gold while the rest is off-white — split the line into two text layers (neutral words + gold words), reveal the gold ones a beat later, slightly larger. Sync each emphasised word to the VO stress. This is what makes the video feel "edited to the voice."
5. **Stagger:** when revealing a list/multiple items, offset each item's start by 2–4 frames. Staggered reveals read as premium; simultaneous reveals read as flat.

---

## 5.6 — Glow & screen light
Used in: phone glow on the face, gold "reward" flashes, see-saw sparks.
- **Native:** duplicate the element → apply **Fast Box Blur** (heavy) → blend mode **Add/Screen** → reduce Opacity. Stack 1–2 blurred copies for a soft bloom.
- Or **Effect → Stylize → Glow** (tune Threshold/Radius/Intensity; set Glow Colors → A&B Colors to keep it gold).
- **Free plugin option:** Saber (by Video Copilot) for energy/light lines.
- **Flicker:** Opacity expression `wiggle(3,8)` for a "live screen" feel.
- Keep glow **motivated** — only where a light source logically exists.

---

## 5.7 — SVG → editable shapes & icon animation
Used in: every icon (slot machine, brain, phone, book, mug, shoe, window, doors, refresh/autoplay/scroll).
1. Import SVG → it comes in as a footage/vector layer. Right-click → **Create Shapes from Vector Layer**. Now every path is editable, recolourable, animatable.
2. Recolour to palette (change Fill/Stroke to gold/off-white/grey).
3. **Standard icon entrance:** Scale 0→100 with overshoot (use the **"Bounce"**-light: 0→105→100, but keep the overshoot SMALL — this niche is calm), plus fade. → [5.5]
4. For "clicking together" (Fogg model): stack icons, each snaps into place 102%→100% with a hard ease + a "click" SFX.
5. For icon **swaps** (phone → book): cross-dissolve + the new icon scales 96→100 as old scales 100→104 and fades.

---

## 5.8 — Camera push-ins & null control (premium movement)
Used in: hook zoom, pull-backs, subtle drift on static scenes.
**Simple (2D) version:**
1. Pre-comp the scene contents. Add a **Null** named `CAM_CTRL`, parent the pre-comp to it.
2. Keyframe the null's **Scale** (e.g., 100→112) and/or **Position** for a slow drift. F9 + Graph Editor (very gentle).

**Proper camera (recommended for parallax):**
1. Make the comp **3D** (toggle the 3D switch on layers).
2. New → **Camera** (35–50mm). New → **Null**, enable 3D, name `CAM_CTRL`, parent the camera to it.
3. Animate the null's Z Position for push-in/pull-back; animate Position X/Y for drift. Always ease.
4. Add **tiny idle drift** so even "still" shots breathe: Position expression `wiggle(0.3, 8)` on the camera null. Subtlety is everything — if you can obviously see the wiggle, it's too much.

---

## 5.9 — 2.5D parallax (bring stills to life)
Used in: the face hook, the phone-on-table pull-back, any AI/stock still.
1. Separate the image into layers (foreground/midground/background) — in Photoshop, or duplicate + mask in AE; fill gaps with content-aware/clone or soft blur.
2. Enable 3D on each layer, spread them on the Z axis (bg far, fg near).
3. Move the camera (→ [5.8]) → the layers shift at different rates = depth. Heavily eased, slow.
4. Add the grain/vignette on top so the comp reads as one image.

---

## 5.10 — Glitch / digital disruption (use sparingly)
Used in: the clock time-jump, optional accents on "brain rot."
- **Quick native glitch:** on a precomp, apply small random keyframes to **Effect → Distort → Transform** (Position/Scale) for 2–3 frames; add **Channel → Shift Channels** or **Effect → Stylize → CC Toner**/RGB split by duplicating the layer 3×, each tinted pure R/G/B via **Set Channels**, offset 2–4px, blend mode **Screen** = chromatic aberration.
- Add 1–2 frames of **noise** (Effect → Noise) and a blink to sell the cut.
- One sharp digital "tick"/"glitch" SFX. **Don't overuse** — one or two glitches in the whole video keeps them powerful.

---

## 5.11 — Citation lower-thirds (credibility system)
Used in: Fogg, Lembke, any researcher/study mention.
1. Build once: a thin horizontal bar bottom-left, a gold accent tick, two text lines (Name / Institution) in Montserrat off-white.
2. Reveal: bar **wipes on** (scale X from a left anchor, or a mask wipe) → text fade+rises → [5.5]. Hold 2s → fades.
3. Save as a precomp template; duplicate and swap text per citation. Keep position/timing identical every time = consistency = trust.
4. **Citations to display** (from the script): Fogg, B.J. — Stanford Persuasive Technology Lab; Lembke, A. (2021) *Dopamine Nation*; Oxford University Press (2024) "brain rot."

---

## 5.12 — Slot machine rig (hero asset)
Used in: Mechanism One, callbacks.
1. **Body:** rounded-rectangle shapes — outer cabinet (navy + gold stroke), three reel windows (darker inset), a lever on the right.
2. **Reels:** for each window, make a tall **strip** of symbols (a vertical text/shape layer with symbols stacked). Pre-comp each strip.
3. **Spin:** on each strip's Position Y add expression for continuous loop, e.g. keyframe Y over one symbol-height and `loopOut("continue")` or drive with `time*speed`. Use a **track matte** (the reel window as alpha matte) so symbols only show inside the window.
4. **Stop sequence:** replace the loop with eased Position keyframes that decelerate each reel to rest — left stops first, then middle, then right (≈4–6 frames apart). Classic slot cadence.
5. **Lever:** Rotation keyframe (anchor at its pivot) down ~30° then back, eased; triggers the spin.
6. **Win state:** when three gold symbols align, trigger a **glow** flash → [5.6] + payout chime. Most stops = grey "nothing."

---

## 5.13 — Slot machine → phone morph
Used in: the signature Mechanism One transition.
**Option A (true shape morph, advanced):** the cabinet shape and the phone shape are the **same shape layer** with **two Path keyframes** (matching vertex counts). AE interpolates the path. Keyframe reel-windows → feed; lever → thumb similarly. Eased ~1.5s.
**Option B (cheat, reliable):** scale/cross-dissolve the slot machine into the phone while a quick light sweep or motion-blurred whip masks the swap. Add a subtle scale "breath" so it feels like a transformation, not a cut. Looks 90% as good, far less risk for video #1.

---

## 5.14 — Scrolling feed rig
Used in: Mechanism One feed, anywhere "the feed" appears.
1. Build a tall pre-comp: a stack of rounded-rectangle "cards" (avatar circle + 2 text lines each), spaced evenly. Most cards muted `#3A4A5C`.
2. Animate the whole stack's **Position Y** upward; `loopOut("continue")` for endless scroll. Vary speed slightly for realism.
3. **Track matte:** mask to the phone screen so cards clip at the screen edges.
4. **Gold flashes:** on ~every 8th–10th card, animate its fill grey→gold for 4–6 frames then back (or a separate gold "highlight" layer that pulses as that card passes the centre). This is the "occasional reward."
5. Add a faint top/bottom gradient fade on the screen so cards dissolve at the edges (mask + feather, or a gradient alpha).

---

## 5.15 — The see-saw rig (THE most important asset)
Used in: all of Mechanism Two, plus any future dopamine content. Build it bulletproof and reusable.
1. **Fulcrum:** a triangle shape, centre-bottom of frame. This is the pivot point — note its X/Y.
2. **Beam:** a long rounded rectangle. **Set its anchor point to its exact centre** (Pan-Behind), positioned to sit on the fulcrum tip.
3. **Pans/weights:** "Pleasure" pan (left) and "Pain" pan (right) — small platforms with labels. **Parent both pans to the beam** so they rotate with it.
4. **Tilt = Beam Rotation.** That's the whole mechanic. Controls:
   - Add a **Null `SEESAW_CTRL`** with a **Slider** ("Tilt", −30 to +30). Expression on Beam Rotation: `thisComp.layer("SEESAW_CTRL").effect("Tilt")("Slider")`. Now you animate one slider instead of fiddling with rotation.
5. **Behaviours to keyframe (via the slider):**
   - *Pleasure hit:* slider 0 → −12 (tilts to pleasure), eased.
   - *Compensation rebound:* −12 → +14 (overshoot past level to pain), eased with slight overshoot.
   - *Repeat & accelerate:* drive the slider with a decaying-then-growing sine, e.g. `amp*Math.sin(time*freq)` where you ramp `freq` up via a second slider → faster oscillation, then keyframe it to **settle and hold on the pain side** (positive value).
6. **Glow cues:** pleasure side flashes gold on a hit → [5.6]; pain side glows soft red as it settles.
7. **Physics feel:** never let it move linearly. A see-saw has weight — ease every move, add a tiny settle wobble after big tilts (one small eased counter-oscillation).
8. Save the whole thing as a precomp `RIG_SeeSaw`. Reuse it for the rest of the channel's dopamine topics — it becomes a recognisable CSL signature.

---

## 5.16 — Phone UI mockup & friction animation
Used in: the Interrupt Protocol (friction), home screen, app folder.
1. **Phone frame:** rounded-rectangle body, thinner rounded screen inset, a notch/status bar with time + battery (Montserrat).
2. **Home screen:** a grid of app icons (rounded squares, palette colours). Give the "worst app" a distinct look.
3. **Drag-to-folder:** keyframe the worst-app icon's Position from its grid slot into a "Time" folder; scale down 100→70 as it enters; the folder scales 100→104→100 to "receive" it. Eased. → [5.5]
4. **Notification badges:** small red circles with numbers; animate them **desaturating/fading to grey** to show "notifications silenced."
5. Add a faint screen reflection/gradient + the glow rig so the phone reads as real. → [5.6]

---

# PART 6 — SOUND, COLOUR, EXPORT, THUMBNAIL & SCHEDULE

## 6.1 Sound design & the final mix (do this in Premiere)

Sound is ~50% of "premium feel." A flat mix makes great visuals look cheap; a good mix makes simple visuals feel expensive.

**Track plan (from PART 3):** A1 = VO, A2 = music, A3 = SFX. Keep them separate so you can balance.

**Level targets:**
- **VO** is king — always the loudest, clearest element. Aim VO peaks around −6 dB, sitting ~−16 LUFS on its own.
- **Music bed** sits *under* the VO — roughly −18 to −24 dB when VO is talking. It should be felt, not heard.
- **Final master:** integrated **−14 LUFS**, true peak ≤ −1 dB. Check with Premiere's **Loudness Radar** (Effect → Audio → Loudness Radar) or the Essential Sound panel.

**Ducking (auto-lower music under VO):**
1. Select music clips → **Essential Sound panel** → tag as **Music**.
2. Enable **Ducking** → set "Duck against: Dialogue" → Sensitivity/Reduction to taste (−18 to −22 dB reduction, fast-ish fades).
3. Generate keyframes. Music now automatically dips when VO speaks and swells in the gaps. This single feature instantly upgrades the mix.

**Manual music moves (the ones that matter most):**
- **Drop music to silence** for: the see-saw core explanation (4C), and the 30-second check (5C). Hard mute with a quick fade. The silence is a deliberate pattern interrupt for an overstimulated viewer.
- **Swap to the warm variant** at the start of the Interrupt Protocol (Scene 05) — signals problem→solution.
- **Bring the bed back** gently after each silent beat.

**SFX discipline:**
- Tag VO in Essential Sound as **Dialogue** → enable light de-noise/de-reverb if needed, and a subtle **EQ** preset (presence boost) so it cuts through.
- SFX should be *quiet and tasteful* — a tick, not a clang. If you notice an SFX consciously, it's probably too loud.
- Add gentle **room tone** under the "silent" beats so they're not digitally dead (true silence sounds like the file broke).
- Sync SFX to motion **on the frame the motion peaks**, not when it starts (impact lands on contact).

**Mix order:** balance VO first (alone), add music + ducking, then layer SFX last. Always do a final listen on **cheap earbuds/phone speaker** — that's what most of your US/UK audience uses.

## 6.2 Colour grade & finishing (the "one look" pass)

Do this **once, globally, in Premiere** using one **Adjustment Layer** spanning the whole timeline (top track). Cleaner than grading every scene in AE.

1. **Adjustment Layer** over everything → apply **Lumetri Color**.
2. **Consistency first:** make sure every AE scene already used the exact palette hexes. The grade is polish, not rescue.
3. **Lumetri moves:**
   - *Basic:* gently lift the navy's richness — small contrast bump, lower highlights a touch so gold doesn't clip, slight black-point lift for a "filmic," non-crushed look.
   - *Curves:* a subtle **S-curve** for contrast; optionally a faint teal/navy push in shadows + warm/gold in highlights (your palette, reinforced).
   - *Vignette:* Lumetri → Vignette, Amount ≈ −1.0 to −1.5, Feather high. Pulls the eye centre. Subtle.
4. **Film grain:** add a grain overlay (a grain clip set to **Overlay/Soft Light**, low opacity ~8–12%) OR a second adjustment layer with a grain effect. This kills banding on the navy gradients and adds texture. **Banding on flat dark backgrounds is the #1 giveaway of an amateur edit** — grain fixes it.
5. **Optional bloom:** a very slight global glow on an adjustment layer (duplicate-blur-screen trick, very low) ties highlights together cinematically.
6. Keep it **restrained** — editorial, not Instagram-filter. The look should feel expensive and calm.

## 6.3 Export settings

**Master archive (optional but smart):** export a high-quality master you keep — **ProRes 422 HQ** (Mac) or a high-bitrate intermediate. Then derive the YouTube upload from it.

**YouTube upload file:**
- Format: **H.264** (Match Source where possible).
- **2160p (4K)** if you worked in 4K — even for a small channel, YouTube allocates more bitrate to 4K, so 1080p viewers see cleaner footage.
- Frame rate: **24fps** (match the project).
- Bitrate: **VBR, 2-pass**. Target ~**40–45 Mbps** for 4K, ~**16 Mbps** for 1080p (above YouTube's recommended minimums = less re-compression).
- Audio: AAC, 320 kbps, 48 kHz, stereo, mastered to −14 LUFS.
- Render at **Maximum Render Quality** and **Maximum Bit Depth** for clean gradients.

> Tip: upload and then let YouTube finish processing the HD/4K versions before going public — early viewers shouldn't see the low-res transcode.

## 6.4 Thumbnail (build in Photoshop/Affinity/Figma)

Your script already specs it; here's the production version. The thumbnail + title decide your click-through rate — spend real time here.
1. Canvas **1280×720**, 16:9.
2. Background: navy `#0B1A2C`.
3. **Hero image:** the bored, glazed face lit by phone glow (same asset family as the video for brand cohesion). Eyes half-lit, slack — the "dead-eyed scroll" everyone recognises.
4. **Text:** "Why Can't You Stop?" in **Cormorant Garamond gold**, bold, large. Subtext small white: "It's not the content."
5. **Readability rules:** big enough to read at phone size (most views are mobile); ≤ 4–6 words; high contrast; face occupies a clear focal third; leave the bottom-right corner cleaner (YouTube timestamp sits there).
6. Make **2–3 variants** to A/B later (different face crops / text). Test which reads best as a tiny thumbnail before publishing.
7. Export PNG/JPG under 2MB.

**Title (from script):** "Why You Can't Stop Scrolling — Even When You're Bored of It." Keep the thumbnail text *different* from the title (they should combine, not repeat).

## 6.5 Derivative content (built into the script — don't skip)

Your script already includes 3 Reels, a 6-slide carousel, and a text post. While the AE assets are open, **export vertical (1080×1920) versions** of the highest-impact moments:
- **Reel 1:** the slot-machine / variable-reward reveal.
- **Reel 2:** the see-saw (pleasure/pain) — highest share potential.
- **Reel 3:** the 30-second check.
Reframe to 9:16 (reposition key elements centre), add bold captions (burned-in, since Shorts are watched muted), end with "full breakdown on the channel." This feeds discovery and session depth at near-zero extra cost.

## 6.6 Beginner production schedule (realistic for video #1)

Don't try to do this in one sitting. Spread it; video #1 always takes longest because you're building all the reusable templates. Future videos will be 2–3× faster because PART 5 is already done.

| Day | Focus | Output |
|---|---|---|
| 1 | Pre-production | VO generated + cleaned, music/SFX licensed & sorted, fonts/icons collected, folders set up |
| 2 | Premiere spine | Radio edit locked, markers placed, pacing map confirmed, placeholder cards on timeline |
| 3 | AE templates (PART 5) | Build the reusable rigs ONCE: fade-rise preset, citation lower-third, see-saw, slot machine, feed, phone UI, title/logo |
| 4 | AE scenes 01–03 | Hook, Problem, Mechanism One rendered to ProRes |
| 5 | AE scenes 04–05 | Mechanism Two (see-saw), Interrupt Protocol rendered |
| 6 | AE scenes 06–07 | Bigger Point + CTA/end screen rendered |
| 7 | Premiere assembly | Drop all renders in, J/L cuts, transitions, pattern-interrupt check |
| 8 | Sound + colour | Music, ducking, SFX, mix to −14 LUFS, global Lumetri grade + grain |
| 9 | Finish | Thumbnail, export, QC pass, derivative reels |
| 10 | Publish | Upload, metadata, end screens, schedule |

If that's too much, the **minimum viable premium** version: keep the see-saw, slot machine, and kinetic-text-to-VO immaculate, and let the quieter scenes be simpler. Those three carry the "premium" perception.

## 6.7 Final QC checklist (before you hit publish)

**Visual**
- [ ] Every keyframe eased — zero linear motion on anything the eye tracks
- [ ] No banding on navy backgrounds (grain applied)
- [ ] Palette consistent across all scenes (navy/gold/red/off-white/grey only)
- [ ] Fonts consistent (Cormorant Garamond headings / Montserrat body)
- [ ] Citations appear for every researcher/study (Fogg, Lembke, Oxford)
- [ ] Title/chapter cards consistent in position & timing
- [ ] End-screen area kept clear for YouTube's cards (last ~5s)
- [ ] Bookend works: opening face ↔ closing face (eyes lifted)

**Pacing / retention**
- [ ] Visual hook on screen within the first ~1.5s, before the first sentence ends
- [ ] A pattern interrupt at least every 20–40s
- [ ] J/L cuts used — VO and visuals not all cutting on the same frame
- [ ] Music drops to silence on the see-saw + 30-second-check beats
- [ ] No section drags (watch the whole thing at 1× without touching anything — note any moment you get bored, and cut it)

**Audio**
- [ ] VO always clearly on top, intelligible on phone speaker
- [ ] Ducking working (music dips under VO)
- [ ] Master at −14 LUFS, true peak ≤ −1 dB
- [ ] No dead-digital silence (room tone under quiet beats)
- [ ] SFX subtle, synced to motion peaks

**Publish**
- [ ] Thumbnail readable at tiny size, text ≠ title
- [ ] Title, description (first 2 lines hook), tags from the script's SEO block
- [ ] Chapters/timestamps in description (helps retention + search)
- [ ] End screen elements added; next-video tease present
- [ ] 4K processing finished before going public

---

## APPENDIX — WHY THIS PRODUCTION STYLE (the strategy in one place)

- **Motion graphics over stock footage** = uniqueness + survives YouTube's 2025 crackdown on low-effort template/AI videos; the 2026 system rewards watch-time, session depth, and repeat visits over clicks ([news.az](https://news.az/news/best-content-formats-for-youtube-in-2026); [popularaitools.ai on the template crackdown](https://popularaitools.ai/blog/ai-faceless-youtube-channels-2026-guide)).
- **One recurring hero visual (the see-saw)** = the channel becomes recognisable; viewers associate the model with you.
- **Kinetic typography synced to VO** = top-performing retention strategy as attention spans shrink ([designrush on animated type & retention](https://www.designrush.com/best-designs/video/trends/8-25-seconds-to-impress-typography-animation-examples-that-maximize-viewer-retention)).
- **Silence + pattern interrupts** = re-grab attention from an overstimulated audience ([internetvideomag](https://internetvideomag.com/how-to-make-internet-videos/the-rise-of-silent-hobby-videos-and-digital-decompression/)).
- **J/L cuts + eased motion + grain** = the invisible polish that separates "premium" from "hobby."
- **Reusable PART 5 templates** = video #1 builds the system; videos #2+ get dramatically faster.

*All external references summarised/paraphrased for compliance with licensing restrictions.*

---

*Production plan prepared for: Cognitive Strategy Lab*
*Companion to: `CSL_Video_Why_You_Cant_Stop_Scrolling.md`*
*Status: Ready for production — Video #1*
*Version: 1.0*
