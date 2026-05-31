# CSL Video — Full Production & Editing Plan

## "Procrastination Isn't Laziness — It's an Emotion You Haven't Named Yet"

**Channel:** Cognitive Strategy Lab (CSL)
**Companion script:** the voiceover script you wrote (the "First 45 Seconds — Stop the Skip" doc — VO-ready).
**This document:** everything that happens *after* the script — voiceover, asset build, **After Effects step-by-step**, **Premiere Pro assembly**, sound, colour, export, thumbnail.
**Your level:** *Beginner* in After Effects + Premiere Pro. So this plan teaches the moves from scratch — what every button does, where it lives, and exactly which keys to press. Nothing is assumed.
**Target audience:** USA, UK, Canada, Australia — English-speaking, 18–40, the "I keep putting this off and I don't know why" crowd.
**Final runtime target:** 9:30–10:00.

> **How to read this doc — honestly.** Do NOT try to absorb all of it at once. Read **PART 0** now (2 minutes). Then, the *first time you ever open After Effects for this video*, do **PART 5** — that's the "learn the moves" section, written for someone who has never touched the software. Once those moves are in your hands, you live in **PART 4** (the scene-by-scene build). Every scene in PART 4 says "use **[Tech 5.x]**" — that points back to the move you already learned. Learn once, reuse forever. This is the exact discipline that lets faceless channels produce premium work fast.

---

# PART 0 — THE 90-SECOND SUMMARY (READ THIS FIRST)

You are making a **motion-graphics explainer** — text, shapes, and simple icons that move, set to a calm voiceover. You are **not** filming anything and **not** stitching stock clips. That single decision is what separates premium faceless channels (think the calm, cinematic, type-driven psychology channels) from the thousands of generic AI-slideshow channels.

**Why this style, backed by current data:**
- YouTube's 2026 system treats **the first 30 seconds as a core ranking signal** and rewards **viewer satisfaction**, not just raw watch time ([outlierkit on the 2026 satisfaction shift](https://outlierkit.com/resources/youtube-viewer-satisfaction-algorithm-2026/)). Our entire edit is engineered so people *don't skip* — exactly what your script title demands.
- The current **kinetic-typography trend has slowed down**: the cheap look was fast captions flying by; the premium 2026 look holds **2–4 words on screen for roughly 0.6–0.9 seconds each**, synced to the voice ([fontmirror on the slower, deliberate move](https://www.fontmirror.com/en/typography-trends-shaping-short-form-ai-video-content/)). That calm, deliberate pace IS your channel's personality — and it's now the trendy one too. Lucky us.
- Showing the words **while** the voice says them (dual-channel) measurably boosts how much people remember ([videoexplainers on audio + on-screen text retention](https://videoexplainers.com/blog/typography-animation-guide)). For a video whose whole point is "name the feeling," making the viewer *read the feeling words* is doubly powerful.

**Your pipeline (the order you'll actually work in):**
1. **Script** → done.
2. **Voiceover (VO)** → record/generate FIRST. The VO is the skeleton; every animation is timed to it.
3. **Premiere Pro** → drop in the VO, do the "radio edit" (lock the pacing with eyes closed), place markers.
4. **After Effects** → build each section as its own project file. **This is ~70% of your work.**
5. **Premiere Pro (again)** → import the AE renders, assemble in order, add music + sound effects, J/L cuts, colour, export.
6. **Export** → master file + thumbnail + 2–3 vertical clips for Shorts/Reels.

**The ONE rule that makes everything look expensive:** *every movement eases.* Nothing moves at a constant robotic speed. You will press **F9** (the "Easy Ease" key) more than any other key in this project. Linear (un-eased) motion is the single biggest reason beginner edits look like beginner edits. We fix that in [Tech 5.2].

**The emotional job of this specific video:** the viewer should feel *seen, not lectured*. The script removes shame ("you're not lazy"). Your edit must match that — quiet, slow, lots of black space, words that breathe. If at any point the motion feels "hype" or busy, you've broken the spell. When in doubt: **slower, simpler, calmer.**

---

# PART 1 — PRODUCTION OVERVIEW & SETUP

## 1.1 Technical specs (set these once, then forget them)

| Setting | Value | Why (plain English) |
|---|---|---|
| Resolution | **3840 × 2160 (4K UHD)** | Even though most viewers watch in 1080p, YouTube gives 4K uploads more data (higher bitrate), so your video looks *cleaner* to everyone. If your computer is slow, work in **1920 × 1080** instead — totally fine for an early video, just be consistent. |
| Frame rate | **24 fps** | 24 frames per second has a calm, cinematic feel that fits "thoughtful psychology." Pick it once and never mix frame rates. |
| Aspect ratio | **16:9** | Standard wide YouTube shape. |
| Colour | **Rec. 709 / sRGB** | The normal colour standard for web video. Don't touch HDR. |
| Audio | **48 kHz, stereo, final loudness −14 LUFS** | "LUFS" is just a loudness measurement. −14 LUFS is the level YouTube aims everything at, so master to it and your video won't get auto-quietened. |

> **Beginner note — what's a "frame"?** Video is a flipbook. At 24 fps there are 24 still images ("frames") per second. When this plan says "hold for 12 frames," that's half a second. Knowing this makes timing instructions concrete.

## 1.2 Which software does what (don't mix them up)

- **After Effects (AE)** = the **animation studio**. Every moving visual the script describes — the text that fades in and rises, the strikethrough lines, the gold tick, the two-path desk diagram, the 5 feeling-cards, the guilt equation, the two step-cards — is built here. AE is for making *short animated clips*.
- **Premiere Pro (Pr)** = the **assembly line**. You line up the VO, drop the finished AE clips in order, add music and sound effects, balance the audio, do the colour, and export the final file. Premiere is for *putting the whole video together*.
- **Photoshop / Figma / Canva (any one)** = the **thumbnail** and any flat background textures.

> **The #1 beginner trap:** trying to edit the *whole video inside After Effects*. Don't. AE gets painfully slow on long timelines and crashes. Build short sections in AE, export each one, then assemble in Premiere. This is exactly how the pros do it.

## 1.3 Folder structure (make this BEFORE you open any software)

A tidy folder structure prevents "missing file" errors later (AE and Premiere link to files by location — if you move them, the project breaks). Create this exactly:

```
CSL_02_Procrastination/
├── 01_Script/                 (the script .md + a plain-text VO-only version)
├── 02_Voiceover/              (raw VO, cleaned VO, alternate takes)
├── 03_Music_SFX/
│   ├── Music/
│   └── SFX/                   (sound effects, sorted by type)
├── 04_Assets/
│   ├── Fonts/                 (Cormorant Garamond, Montserrat)
│   ├── Textures/              (film grain, vignette, paper)
│   └── Icons/                 (SVG icons: desk, phone, planner, clock, etc.)
├── 05_AfterEffects/
│   ├── _MASTER_TEMPLATES.aep  (your reusable moves — built in PART 5)
│   ├── S00_Hook.aep
│   ├── S01_WhatItIs.aep
│   ├── S02_FiveFeelings.aep
│   ├── S03_WhyFixesFail.aep
│   ├── S04_Technique.aep
│   ├── S05_Close.aep
│   └── S06_CTA.aep
├── 06_AE_Renders/             (finished clips exported from AE land here)
├── 07_Premiere/               (the master Premiere project)
├── 08_Exports/                (final video, thumbnail, vertical clips)
└── 09_Thumbnail/
```

**Why one AE file per section:** if AE crashes (it sometimes will), you lose one section, not the whole video. It also keeps each project light and fast.

## 1.4 The CSL visual language for THIS video (lock these — consistency = "premium")

Your channel's signature is **dark navy + gold, serif headlines, calm motion**. This video adds one deliberate twist: the **hook and the close happen on PURE BLACK**, not navy. That's intentional — pure black + a single italic serif line feels like a held breath. It's the most intimate, "just you and me" frame you can make, and the script asks for it. Everything *between* the hook and close uses the standard navy world.

**Colour palette (save these exact hex codes):**

| Role | Colour | Hex | Where it's used |
|---|---|---|---|
| Hook / close background | **Pure black** | `#000000` | Only the opening 45s and the closing line. Maximum intimacy. |
| Content background | **Dark navy** | `#0B1A2C` | Every teaching section (01–04). The channel's signature. |
| Primary accent | **Gold** | `#C9A84A` | Headlines, the key word, the gold tick, "the answer." The colour of *insight*. |
| Alert / problem | **Soft red** | `#C94A4A` | The strikethroughs ("Not laziness"), the red X on failed fixes, the final line of the guilt equation. Use *sparingly* — red is a spice, not a sauce. |
| Text / neutral | **Off-white** | `#F2EEE5` | Body text and labels. **Never pure white** on navy — it's harsh. (On the pure-black hook/close, a near-white `#F2EEE5` still reads beautifully and stays on-brand.) |
| Muted / "dimmed" | **Grey-blue** | `#3A4A5C` | Inactive feeling-cards (dimmed to the back), de-emphasised UI, axis lines. |

**Typography (install both fonts before opening AE — both are free on Google Fonts):**
- **Headlines, title cards, the hook line, the closing line:** **Cormorant Garamond** — an elegant serif. Use the *Italic* weight for the hook and close (the script specifies italic — it feels like a personal whisper). Gold or off-white.
- **Body text, feeling-card descriptions, labels, the equation:** **Montserrat** (or Inter) — a clean sans-serif. Off-white.
- **Citations (Sirois, etc.):** Montserrat, smaller, sitting low on screen.

**Texture & mood (applied once at the end, in Premiere — see PART 6):**
- A subtle **film grain** over everything. This kills the flat "digital" look and stops "banding" (ugly stripes) on dark backgrounds. **Banding on dark backgrounds is the single biggest giveaway of an amateur edit — grain fixes it.**
- A gentle **vignette** (darkened corners) to pull the eye to the centre.
- **Glow** only where something is meant to feel warm or important (the gold tick, "the answer").

**Motion personality (tattoo this on your brain):** *slow, deliberate, eased.* Things fade up and gently rise into place, then settle. Nothing snaps, nothing bounces hard, nothing spins for fun. Think "expensive documentary," not "energy-drink advert." The script carries the emotion; the motion just supports it.

## 1.5 Absolute-beginner crash course — the 12 words you MUST know

Before PART 5, here are the only pieces of jargon you need. Read once; it'll make everything else click. (Full step-by-step for each is in PART 5.)

1. **Composition (comp):** an After Effects "scene" — a canvas with its own size, frame rate, and timeline. You build each video section inside its own comp.
2. **Layer:** anything inside a comp — a piece of text, a shape, an icon, an image. Layers stack top-to-bottom (top layer is in front).
3. **Keyframe:** a saved value at a moment in time. Set one keyframe for "text is invisible at 0 seconds" and another for "text is fully visible at 0.4 seconds," and AE fills in the in-between automatically. Keyframes are the heart of all animation.
4. **Transform properties:** the five things every layer can do — **Position, Scale, Rotation, Opacity, Anchor Point**. You animate these by keyframing them.
5. **Anchor Point:** the invisible "pin" a layer rotates and scales around. Get this in the right place and animation feels natural; get it wrong and things rotate weirdly off to the side.
6. **Easy Ease (F9):** the magic key. Select your keyframes, press **F9**, and the motion stops being robotic — it starts and stops gently. Premium motion = eased motion.
7. **Graph Editor:** a panel that shows your motion as a curve so you can fine-tune the easing (slow-fast-slow). The button looks like a little graph icon at the top of the timeline.
8. **Pre-comp:** a comp placed *inside another comp* — like a group/folder for layers. Lets you animate many layers as one unit.
9. **Parenting:** linking one layer to another so the "child" follows the "parent." Move the parent, the children come along.
10. **Mask:** a shape that hides part of a layer (shows only what's inside the shape). Used to make text "wipe on" or to clip things to a screen.
11. **Track Matte:** using one layer's shape (or brightness) to decide what's visible on the layer below. Like a stencil.
12. **Expression:** a tiny line of code on a property that makes it move automatically without keyframes (e.g. a gentle endless `wiggle`). You'll use a handful of these — all given to you in [Tech 5.13], copy-paste ready.

> If those 12 make basic sense, you're ready. You don't need to *master* them now — PART 5 walks each one in clicks.

---

# PART 2 — PRE-PRODUCTION (do all of this before opening After Effects)

## 2.1 Voiceover — the foundation everything is timed to

This script is **emotional and quiet**. The voice is more important here than in any flashy video, because there's so much silence and space. The voice IS the product.

**Option A — AI voiceover (standard for faceless channels, fine for this video):**
- Use a top-tier neural voice (ElevenLabs is the current quality leader; alternatives exist). Choose a **calm, warm, mid-tone, neutral-English** voice. **Not** energetic, not "announcer." Audition 4–5 voices reading just the hook ("There is a task on your to-do list right now…") before committing — the voice is your channel's identity.
- The script is full of `[PAUSE]` cues. **Honour every one.** In ElevenLabs you can insert a break tag like `<break time="1.0s" />`, or simply leave the gap and create it in Premiere. The silences are not dead air — they're the most powerful tool in this script. The 5-second silence at the start is doing *more* work than any animation.
- **Generate per paragraph/beat, not the whole script at once.** That way you can re-roll one weak line without redoing everything, and you get clean split points.
- Pace target: roughly **140–150 words per minute**. When unsure, slower.

**Option B — your own voice (most authentic, best long-term):** A USB condenser mic in a soft, furnished room (or even under a thick blanket to kill echo), recorded in Audacity (free) or Adobe Audition. Read it like you're explaining something to one friend across a table — never "perform" it. Do two takes of the hook and the close; those matter most.

**VO cleanup (either route):**
- A light **noise reduction**, a **high-pass filter** around 80 Hz (removes low rumble), and a **de-esser** if the "s" sounds are harsh.
- Level the VO to around **−16 LUFS on its own** (music will sit under it later).
- Export the VO as **one continuous WAV** *and* keep the per-beat files in `02_Voiceover/`.

## 2.2 Music — the emotional bed

This video lives in **restraint**. The music should be almost not-there. You need:
- **1 main ambient bed:** a single sustained piano or soft pad. Minimal, slow, no melody that competes with the voice. Tension and warmth, not "a song."
- **1 warmer variant** for the solution section (04) and the close — a barely-perceptible lift that signals "we're moving toward hope."
- **Critically: long stretches of NO music.** The hook's 5-second silence has *zero* music. The guilt-equation hold and the closing line have *zero* music. Silence is a deliberate weapon against an overstimulated viewer ([fontmirror notes the move toward slower, calmer pacing](https://www.fontmirror.com/en/typography-trends-shaping-short-form-ai-video-content/)).

**Where to license (safe for monetisation):** Epidemic Sound, Artlist, Musicbed, or Uppbeat (has a free tier). **Avoid** random "free" tracks from YouTube — they trigger Content ID claims that can demonetise the video. Get a proper licence.

## 2.3 Sound effects (SFX) — the quiet secret of premium edits

This niche is built on *subtle* sound design. You want a tiny, tasteful kit — ticks and hums, never clangs:
- Soft UI **"tick"/"click"** (for text appearing, a card sliding in)
- A short **"draw"/whoosh"** (for the strikethrough lines and the equation divider)
- A warm, satisfying **"set"/soft chime** (for the gold tick — the one moment of reward)
- A low **hum/drone** (under tense beats, like the guilt equation)
- A deep, soft **"thud"** (one or two emphasis beats only)
- **Room tone / near-silence** (a barely-there ambience to lay under the "silent" beats so they don't sound digitally dead)

**Sources:** Epidemic Sound / Artlist SFX libraries, or free from freesound.org (check each licence). Sort them into `03_Music_SFX/SFX/` by type so you're not hunting later.

> **Rule of taste:** if you *consciously notice* a sound effect, it's too loud. SFX should be felt, not heard.

## 2.4 Fonts & icons

- **Install both fonts now:** Cormorant Garamond + Montserrat (free, Google Fonts). Install them at the system level *before* opening AE, or AE won't see them.
- **Icons:** this video needs only a few simple line/flat icons — a **desk/laptop**, a **phone**, a **task/document**, a **planner/calendar**, a **timer/clock app**, a **to-do checklist**, and small **emotion symbols** (e.g. a simple "anxiety" squiggle, a flat "bored" face). Get them as **SVG** from a single consistent set so they share a style — Lucide, Phosphor, or Iconscout are clean and free/cheap. SVGs import into AE and become fully editable, recolourable shapes ([Adobe on shape layers & vector graphics](https://helpx.adobe.com/after-effects/using/overview-shape-layers-paths-vector.html)). We cover this in [Tech 5.7].

> **Honestly, you can build most of this video with text + basic shapes alone.** Icons are seasoning. Don't let "finding the perfect icon" stall you.

## 2.5 Master asset checklist (tick before you open After Effects)

- [ ] Final VO — one continuous WAV + per-beat files, cleaned and levelled
- [ ] Every `[PAUSE]` in the script preserved in the VO
- [ ] Main music bed + warm variant
- [ ] SFX kit sorted (tick, whoosh, soft chime, hum, thud, room tone)
- [ ] Fonts installed (Cormorant Garamond, Montserrat)
- [ ] A handful of SVG icons collected
- [ ] Film grain + vignette overlay in `04_Assets/Textures/`
- [ ] Colour palette hex codes saved somewhere visible
- [ ] This plan open on a second screen (or printed)

---

# PART 3 — PREMIERE PRO: THE SPINE & "DON'T-LET-THEM-SKIP" ENGINEERING

You build the *structure* in Premiere first — before any fancy animation — so the pacing is locked. Then you go make the AE clips. Then you come back here to finish. This is the "first pass."

## 3.1 Project & sequence setup (click-by-click)

1. Open Premiere → **New Project** → name it `CSL_02_Procrastination_MASTER`, save it inside `07_Premiere/`.
2. **File → New → Sequence.** In the dialog, easiest path: pick a preset that matches your footage, or under the **Settings** tab set **Editing Mode = Custom**, **Frame Size = 3840 × 2160** (or 1920 × 1080), **Timebase = 24fps**. Name the sequence `MASTER_TIMELINE`.
3. **Set up your tracks** (the horizontal lanes). Right-click a track header → **Rename**, and label them with purpose:
   - **V3** — text/overlays that live in Premiere (rare here; mostly captions)
   - **V2** — your After Effects clips (the motion graphics)
   - **V1** — backgrounds / placeholders
   - **A1** — Voiceover
   - **A2** — Music
   - **A3** — Sound effects (SFX)
4. **Import the VO:** drag your continuous VO WAV into the **Project panel**, then drag it onto track **A1**, starting at **1 second in** (not at 0:00). That 1-second of leading silence gives a clean, professional start and breathing room.

## 3.2 The "radio edit" — the most important step beginners skip

Before you make a single visual, you edit the *audio alone* until it's gripping with your eyes closed.

1. With only the VO on the timeline, **play the whole thing start to finish, eyes closed.**
2. Cut dead air, awkward breaths, and any line that drags. To cut: position the playhead, press **C** (Razor tool) to slice, press **V** (Selection tool), click the unwanted chunk, press **Delete**, then right-click the gap → **Ripple Delete** to close it.
3. **Tune the pauses by feel, not by the clock.** The script's 5-second opening silence and every `[PAUSE]` should feel *slightly uncomfortable* — that discomfort is the hook. If a pause feels "too long," it's probably right. Lengthen the silences before you shorten them.
4. When the audio-only version makes *you* lean in with your eyes shut, the structure is locked. If it's boring with eyes closed, no animation will save it — fix the audio first.

> Professionals call this "editing for the ear first." It's the difference between a video that *feels* tight and one that drags.

## 3.3 Markers = your shot list (and your AE clip lengths)

Now walk the playhead through the locked VO and drop a **marker** (press **M**) at the start of every visual beat. Double-click a marker to name it (e.g. "S00 Hook — black", "S00 Strikethrough lines", "S01 Sirois citation", "S02 Feeling 1 Anxiety", "S03 Equation", "S04 Step 1"…).

Why this matters: the **gap between two markers tells you exactly how long that After Effects clip must be.** Build each AE comp to that length and the finished clip drops straight onto the timeline with no guesswork. Screenshot your marker list — it's your build checklist.

## 3.4 The pacing map — retention architecture for THIS script

Current guidance: the **first 30 seconds are now a core ranking input**, and a **pattern interrupt roughly every 90 seconds** can lift average view duration 15–25% ([outlierkit, 2026 algorithm + script structure](https://outlierkit.com/resources/youtube-script-writing/)). Here's how your script maps to that — and notice how the *silences* are doing the retention work, which is rare and powerful:

| Time | Section | Why people stay | Visual energy |
|---|---|---|---|
| 0:00–0:45 | **Hook** | A direct accusation ("that task you've avoided for 3 days") + a 5-second silence that's so unusual people *can't* skip it. No logo, no intro. | Near-zero — stillness IS the hook |
| 0:45–2:30 | **01 What it actually is** | Reframe + a credible name (Sirois). Open loop: "a completely different solution." | Low–medium, calm |
| 2:30–4:30 | **02 The 5 feelings** | Self-diagnosis — the viewer is matching their own task to a feeling. Highly interactive in the mind. Each new card = a mini pattern interrupt. | Medium (one card at a time) |
| 4:30–6:00 | **03 Why fixes fail** | "Everything you tried was wrong, and here's why" — validation + the guilt equation lands hard. | Medium, heavier |
| 6:00–8:30 | **04 The technique** | The payoff. They came for this. Two clean, doable steps. | Medium, brighter |
| 8:30–9:30 | **Close** | Emotional resolution on pure black. The line they'll screenshot. | Near-zero, intimate |
| 9:30–end | **CTA** | Tease the scrolling video → a watch-next loop (session depth, the algorithm's favourite). | Low, branded |

**Chapter/section cards** ("01", "02"…) double as retention tools — each one is a tiny "new chapter" promise that resets attention. Keep them ~1 second.

## 3.5 Pattern interrupts — plan one every ~30–60 seconds

A "pattern interrupt" is any deliberate change that re-grabs a wandering eye. In this calm video they're gentle but real:
- A **section card** (01, 02, 03, 04)
- **Music dropping to silence** (the hook, the equation hold, the close)
- A **colour shift** (the red of a strikethrough or the equation's final line, against all that navy)
- A **gold reveal** (the tick; "the answer")
- A **slow push-in** (camera easing closer on a key line)

Mark these on the timeline. If you ever go 60+ seconds with no change at all, add one. (In this script they're already well spaced.)

## 3.6 J-cuts and L-cuts — the "invisible polish"

These make the edit feel seamless instead of chopped. Definitions, plain:
- **J-cut:** you *hear* the next section's audio **before** you *see* its picture.
- **L-cut:** the current audio **keeps playing over** the next picture.

([Adobe's guide to J and L cuts](https://helpx.adobe.com/uk/premiere-pro/using/perform-j-and-l-cuts.html).)

**How to do one in Premiere (simple version):** on the timeline, the audio and video of an AE clip are usually "linked." Right-click the clip → **Unlink**. Now you can drag the *video* edit point and the *audio* edit point to different frames. Offset them by about **6–14 frames** so the voice of the next idea starts a beat *before* the next visual appears. Don't cut voice and visuals on the exact same frame for the entire video — that "everything-snaps-together" feeling is what makes amateur edits feel stiff.

**Where it shines in this video:** let the VO line that *introduces* a feeling begin while the *previous* feeling-card is still settling — it pulls the viewer forward into the list.

## 3.7 Handing scenes off to After Effects (two ways)

- **Dynamic Link** (live, no rendering): in Premiere, right-click a clip → **Replace With After Effects Composition**, or import the `.aep`. Changes in AE show up live in Premiere. Great while you're still tweaking, but it makes playback heavier and can be crash-prone on long timelines.
- **Render to a video file** (rock-solid, the pro default for finishing): in AE, export each finished section to a high-quality file (**ProRes 422 HQ** on Mac, or a high-bitrate intermediate on Windows) into `06_AE_Renders/`, then import that `.mov` into Premiere. Fast, stable playback.

**Recommended for you (a beginner):** use **rendered files**. It's simpler to reason about and won't crash mid-edit. Build a section in AE → export it → drop it in Premiere → move on. (Full export-from-AE settings are in [Tech 5.19].)

---


# PART 4 — SCENE-BY-SCENE AFTER EFFECTS BUILD

**How this section works.** Each scene gives you: the emotional goal, the comp setup, a numbered build order, and the easing/sound notes. Anything marked **→ [Tech 5.x]** is a reusable move taught step-by-step in PART 5 — build those once in `_MASTER_TEMPLATES.aep`, then copy them in. Every comp is 3840×2160 (or 1080p), 24fps, and as long as your Premiere marker told you.

**Global rules for EVERY scene (memorise — they're 80% of the "premium" look):**
- Background is a **solid colour** — `#000000` for the hook/close, `#0B1A2C` navy for content. On navy, add a faint **radial gradient** (slightly lighter navy in the centre) so it isn't dead-flat — Effect → Generate → **Gradient Ramp**, set to *Radial*. This one move instantly looks "designed." [Tech 5.1]
- **Every keyframe gets Easy Ease (F9)** at minimum. For important moves, open the **Graph Editor** and shape the curve. [Tech 5.2]
- Text and elements **never just pop on** — they **fade + rise** (move up ~20–40px while fading in). [Tech 5.3]
- Keep motion **slow**. If you think it's slow enough, it's probably still a touch fast for this video.
- Don't add grain/vignette inside AE — we do it once, globally, in Premiere (PART 6). One place = consistent.

---

## SCENE 00 — THE HOOK [0:00 – 0:45]
*"There is a task on your to-do list right now…" → the crossed-out list → the gold tick.*

**Goal:** Stop the skip. This is ~50% of the whole video's importance ([retention playbooks say to spend half your effort on the opening](https://contentcreators.com/resources/toolkit/youtube-retention-playbook)). The weapon here is **silence and stillness**, not motion. Resist the urge to decorate.

**Comp:** `S00_Hook`, background **pure black `#000000`**, length ≈ 45s (match your marker).

### 00A — The single italic line (0:00–~0:10)
The script: black screen, one line fades in slowly — *"That task you keep putting off."* — Cormorant Garamond **italic**, large, then **hold for 5 seconds in complete silence.**
1. Create a **Text layer** (Toolbar → Type tool **T**, click on the canvas, type the line). Font: **Cormorant Garamond Italic**, colour off-white `#F2EEE5`, large (centre it: select layer → Align panel → horizontal + vertical centre).
2. Animate a **slow fade-up**: this is the [Tech 5.3] fade+rise, but make it *extra slow* — fade Opacity 0→100 over about **1.5 seconds**, with only a tiny rise (10px). Easy Ease (F9) both keyframes. The slowness signals "this is serious."
3. **HOLD for 5 full seconds.** No motion, no sound. This empty space is the hook. (You'll keep this silence in Premiere — make sure the VO doesn't start until after it.)
4. Then fade the line out gently (Opacity 100→0 over ~0.8s) as the voice resumes.

> **Do not** add a background animation, particles, or a music swell here. The discomfort of the silence is the point. Trust it.

### 00B — The crossed-out list + the gold tick (~0:30–0:45)
The script shows three lines appearing one at a time, each struck through as the VO names it, then a gold tick on the final positive line:
```
❌  Not laziness
❌  Not poor discipline
❌  Not not caring

✓  How the task makes you FEEL   ← gold
```
1. Make **four Text layers** (Montserrat), stacked vertically and evenly spaced. The first three off-white; the fourth (the "feel" line) you'll turn gold.
2. **Reveal each line** with the fade+rise [Tech 5.3], **staggered by 0.6s** (so line 2 starts 0.6s after line 1, etc.) — synced to the VO naming each one.
3. **The strikethrough** that "draws" left→right across each of the first three lines is built with the **pen tool + Trim Paths** → full step-by-step in **[Tech 5.6]** and the specific recipe in **[Tech 5.8]**. Each strike draws over **0.3s**, in soft red `#C94A4A`, timed to land as the VO says that word.
4. **The gold tick** on the final line: built and animated in **[Tech 5.9]** — it scales from 80%→100% with a *gentle* ease-out settle (a whisper of overshoot, not a cartoon bounce), and the "feel" text turns/reveals in gold `#C9A84A`.
5. **Hold the finished graphic for ~3 seconds** so it lands.

**Easing/sound:** silence-led. A single soft **"tick"** as each line appears; a quiet **"draw"** whoosh under each strikethrough; one warm **soft chime** on the gold tick (the first real "reward" sound in the video). Music stays out or barely-there until after the hook.

---

## SCENE 01 — WHAT PROCRASTINATION ACTUALLY IS [0:45 – 2:30]
*History got it wrong → Dr. Fuschia Sirois → it's an emotional decision → the two-path desk diagram.*

**Goal:** Replace the viewer's old belief ("I'm lazy / bad at time management") with the new frame ("it's about feelings"). Calm, credible, clear.

**Comp:** `S01_WhatItIs`, **navy `#0B1A2C`** + radial gradient [Tech 5.1].

### 01A — The Sirois citation card
The script's on-screen text:
```
Dr. Fuschia Sirois
Durham University

"Procrastination is an emotion regulation
problem — not a time management problem."

Sirois & Pychyl, 2013
```
1. Build this with the **citation lower-third** template [Tech 5.11], but here it's a larger centred card because it's a headline idea, not a passing credit.
2. Reveal order (each with fade+rise [Tech 5.3], staggered ~0.4s): name → institution → the quote (the quote is the hero — make it largest, off-white, with the words **"emotion regulation"** in **gold**) → the citation line (smallest, grey-blue `#3A4A5C`).
3. A thin **gold underline draws on** beneath the name using Trim Paths [Tech 5.6] — an editorial touch.
4. Hold ~3s. This card buys you enormous credibility — let it breathe.

> **Accuracy note:** the citation is real and correct — Sirois & Pychyl (2013), *Procrastination and the Priority of Short-Term Mood Regulation* ([Wiley](https://compass.onlinelibrary.wiley.com/doi/abs/10.1111/spc3.12011)). Keep it exactly as written; accurate citations are your channel's moat.

### 01B — "Short-term mood relief over long-term benefit" (kinetic text)
As the VO explains the trade, use **kinetic typography** [Tech 5.3 + 5.13] — show the key phrases as the voice says them, in 2–4 word chunks held ~0.7s each (the current premium pace). Emphasise the contrast: **"escape the feeling"** in gold vs the task in plain off-white.

### 01C — The two-path desk diagram (the hero visual of this scene) → [Tech 5.15]
The script: a person at a desk, a task on screen, a feeling icon (anxiety) appears; two paths branch — **Path A** (start the task → stays uncomfortable) and **Path B** (open phone → relief icon briefly, then it fades and the task reappears *slightly larger*). The avoidance makes the task feel *bigger*, not smaller.

This is the most important teaching image in the section. It's a custom build — the full rig is in **[Tech 5.15]**. In short:
1. A simple **desk + laptop** (icons or basic shapes [Tech 5.7]), centred, navy world.
2. An **anxiety symbol** (a small jagged/squiggle shape, drawn with the pen tool [Tech 5.5]) fades in over the task — soft red tint.
3. The path **splits** into two glowing lines that **draw on** with Trim Paths [Tech 5.6].
4. **Path A** ends on the task still there, the anxiety symbol *still present* (honest — starting doesn't instantly feel good).
5. **Path B**: a phone icon slides in, a "relief" symbol (a soft gold pulse) flashes [Tech 5.12 glow], then **fades** — and the task icon **scales up ~115%** to show it now feels bigger. This scale-up is the punchline; ease it slowly so it feels like dread growing.

**Easing/sound:** calm bed underneath. Soft tick as the anxiety symbol appears; a brief warm pulse-sound on Path B's "relief"; a low, slightly hollow tone as the task grows (the unsettling beat).

---

## SCENE 02 — THE 5 FEELINGS BEHIND EVERY DELAYED TASK [2:30 – 4:30]
*"It's not you — it's the specific feeling." → Anxiety, Boredom, Self-doubt, Frustration, Resentment, one at a time.*

**Goal:** Self-diagnosis. The viewer is silently matching their avoided task to one of these. Build the list **one card at a time** — never show all five lit at once. This is both the script's instruction and good attention design (one focus point at a time).

**Comp:** `S02_FiveFeelings`, navy + gradient.

### 02A — Title card
"The 5 Feelings That Cause Procrastination" — Cormorant Garamond, gold, centred. Fade+rise [Tech 5.3], hold ~1s, then it shrinks/rises to the top to make room (or cuts away). Section card = a mini pattern interrupt.

### 02B — The five cards (the hero rig) → [Tech 5.16]
The script's exact spec — honour it precisely:
- Each card **enters from the left** (Position X from −40px → 0) while fading in (Opacity 0→100), over **0.35s, ease-out**.
- The **number is gold**, the **emotion name** below it (white), then a one-line description.
- **Stagger 0.9s** between cards (slow — matches the VO reading each).
- When the next card appears, the **previous cards dim to 40% opacity**. Only the *current* feeling is bright. Never five bright at once.

The five, in order, with the script's framing (keep the empathy — each line says "this isn't laziness"):
1. **Anxiety** — fear of doing it wrong / being exposed. *Self-protection.*
2. **Boredom** — no stimulation or reward. *Your brain seeking engagement.*
3. **Self-doubt** — "I can't do it well enough." *Not starting protects you from finding out.*
4. **Frustration** — unclear, messy, hard to begin. *The overwhelm is real.*
5. **Resentment** — it feels forced or meaningless. *Your brain needs meaning to engage.*

The full reusable card-stack rig (how to build one card and duplicate it five times, how to do the "dim the old ones" move with one shared control) is in **[Tech 5.16]**.

### 02C — "Name the feeling" beat
The script ends the section: *"A feeling has an address. Laziness does not."* Put this as a **kinetic-type** payoff [Tech 5.3] — **"A feeling has an address."** in gold, held, then a beat, then **"Laziness does not."** in dim grey-blue that *fails to resolve* (lower opacity, no glow). The contrast in treatment *is* the meaning.

**Easing/sound:** one soft **tick/slide** as each card enters. A subtle low hum holds the section together. The "address" line gets a tiny warm chime; the "laziness" line gets *nothing* (deliberate — emptiness).

---

## SCENE 03 — WHY EVERY FIX YOU'VE TRIED HAS FAILED [4:30 – 6:00]
*The failed productivity tools → and the guilt equation that makes it worse.*

**Goal:** Validate the viewer's frustration ("you tried and it didn't work — here's why it *couldn't* have"), then deliver the gut-punch insight that guilt deepens procrastination. This is the emotional turn before the solution.

**Comp:** `S03_WhyFixesFail`, navy + gradient.

### 03A — The failed fixes
The script: a planner, a timer app, and a to-do list each appear with a soft **red X**, then text: *"These solve the wrong problem."* Hold ~3s.
1. Three **icons** (planner/calendar, timer, checklist) [Tech 5.7], entering with a small fade+rise, staggered.
2. A **red X** draws onto each with Trim Paths [Tech 5.6 + 5.8] — two quick strokes forming an X, soft red `#C94A4A`. **Not mocking — honest.** Keep the icons dignified (don't shake or "buzzer" them; this isn't comedy).
3. The line *"These solve the wrong problem."* fades+rises under them, off-white.

### 03B — The guilt equation (the hero of this scene) → [Tech 5.17]
The script's exact on-screen build:
```
   Anxiety about the task
 + Self-criticism for not starting
 ──────────────────────────────
 = Even stronger avoidance
```
- Each line **fades in sequentially, ~0.8s apart** [Tech 5.3].
- The **dividing line draws left→right** with Trim Paths [Tech 5.6].
- The **final line ("= Even stronger avoidance") is in red `#C94A4A`, slightly larger.**
- **Hold the full equation for 5 seconds.** Let the viewer sit with it.

The full step-by-step (how to align an equation cleanly, how to animate the divider, how to make the sum "land") is in **[Tech 5.17]**.

**Easing/sound:** a low, slightly tense **hum/drone** under this whole scene. A soft **tick** per equation line; a quiet **draw** for the divider. On the final red line, a single soft **thud** — then the music drops away into the 5-second hold. Silence makes the equation echo.

---

## SCENE 04 — THE TECHNIQUE THAT ACTUALLY WORKS [6:00 – 8:30]
*Step 1: Name the emotion (affect labelling). Step 2: The two-minute start. + self-compassion.*

**Goal:** The payoff they stayed for. Tone **lifts** here — switch to the warmer music variant, slightly brighter navy, cleaner layouts. This should feel like *control returning, gently.*

**Comp:** `S04_Technique`, navy + gradient (nudge the gradient centre a touch brighter than earlier scenes to signal the mood lift).

### 04A — "Two things. Under three minutes. No app." (kinetic intro)
Quick kinetic-type setup [Tech 5.3] establishing the promise — keep it light and reassuring. A faint **"STEP 1 / STEP 2"** pair of empty slots can appear here and fill in as each is taught (a small progress device that rewards watching).

### 04B — STEP 1: Name the Emotion
On-screen (from the script):
```
STEP 1 — Name the Emotion
"I'm avoiding this because I feel ___."
Anxious / Bored / Self-doubtful
Frustrated / Resentful
```
1. **"STEP 1 — Name the Emotion"** as a title [Tech 5.3], gold "STEP 1", off-white name.
2. The sentence *"I'm avoiding this because I feel ___."* with the blank as a **type-on** [Tech 5.4]; then the five feeling words cycle/appear in the blank one by one (callback to Scene 02 — reuse the same gold styling).
3. As the VO explains **affect labelling** ("naming a feeling reduces its intensity"), show a simple visual: a soft-red **anxiety blob** that, the moment a gold **label** ("ANXIOUS") attaches to it, **shrinks and calms** (scale down ~15%, desaturate a touch, settle). That's the science made visible — naming literally shrinks it.

### 04C — STEP 2: The Two-Minute Start
On-screen:
```
STEP 2 — The Two-Minute Start
Not to finish. Not to do it well.
Just two minutes of beginning.
The anticipation is almost always
worse than the task itself.
```
1. Title [Tech 5.3].
2. A small **2:00 countdown** — a circle whose gold stroke draws around as it counts, built with **Trim Paths on an ellipse** [Tech 5.6 / radial timer in 5.18]. It doesn't need to run the full two minutes on screen — a few seconds of motion implies it.
3. The key reframe — **"the anticipation is worse than the task"** — as kinetic type [Tech 5.3], the word **"anticipation"** in gold. Optionally: a tall, looming task-shape that, once "begun," visibly **shrinks** to its true (smaller) size — the dread deflating.

### 04D — The self-compassion beat
The script: if you can't continue after two minutes, stop — you broke the loop; self-compassion predicts *less* future procrastination. Treat this softly — off-white text, warm bed, a gentle gold underline drawing on under **"two minutes, without judgment, is a genuine win."** No harsh colours here. This is the kindest moment in the video; let the visuals be kind too.

**Easing/sound:** warmer bed returns. Soft, satisfying **"set"** ticks as each step title locks in and as the step-slots fill. A gentle warm chime when Step 2 completes. Keep it calm — relief, not celebration.

---

## SCENE 05 — THE CLOSE: THE ONE LINE TO REMEMBER [8:30 – 9:30]
*Reframe the whole video → the screenshot line on pure black.*

**Goal:** Emotional resolution. This is where the viewer decides to subscribe — because you made them feel *understood*. Slow everything to a near-stop.

**Comp:** `S05_Close`, **back to pure black `#000000`** (bookending the hook).

1. As the VO delivers the closing summary ("name what you're feeling, lower the threshold, be kind to yourself"), you may briefly bring the **two steps back as a clean, calm recap** [Tech 5.3] — minimal, off-white, no decoration. Or stay on black with quiet kinetic phrases. Less is more.
2. Then the screen goes fully black and the hero line **slowly fades in**, Cormorant Garamond **italic**, large, centred, off-white:
```
"Procrastination is not a
time management problem.

It's an emotion you
haven't named yet."
```
3. Reveal it the same extra-slow way as the hook's opening line [Tech 5.3] (fade over ~1.5s, tiny rise). **Hold for 6 full seconds.** Then **fade to black over 2 seconds.** **No music swell — silence only.** The script is explicit: give this maximum space. It's the channel's signature line and its first real impression.

**Easing/sound:** silence. If anything, a single sustained warm pad note *underneath*, fading to nothing by the end. No SFX. The quiet is the production value.

---

## SCENE 06 — CTA / END SCREEN [9:30 – end]
*Subscribe + the watch-next loop into the scrolling video (CSL 002).*

**Goal:** Convert the emotion into an action and a second view. Session depth (watching a *second* video) is the metric the 2026 system loves most.

1. **Channel branding:** "COGNITIVE STRATEGY LAB" in gold serif animates in — your **logo stinger**, built once and reused on every video [Tech 5.10].
2. **The CTA line** from the script (over the subscribe screen): share it with one person, and *"the next video covers why you can't stop scrolling… Same brain. Different trap."* Show a clean **teaser frame** for the scrolling video (CSL 002) to pull them straight into it.
3. **End screen layout:** leave the last ~5 seconds on a calm, low-motion frame with **empty space where YouTube's end-screen cards sit** (one video box + a subscribe element). Don't put busy graphics where the cards will land — design *around* them. Place the scrolling-video suggestion box so the watch-next loop is one click.

**Easing/sound:** soft outro bed, resolving gently. One final subtle logo tone. Keep it short — don't overstay; the emotional close already did the heavy lifting.

---


# PART 5 — THE BEGINNER'S TECHNIQUE LIBRARY (learn each move ONCE)

This is your training section. Each technique is written for someone opening After Effects for the first time. Build them inside `_MASTER_TEMPLATES.aep`, save your favourites as **Animation Presets** (right-click the animated properties → **Save Animation Preset**), and you'll reuse them all video with one click.

> **No paid plugins are required for any of this.** Everything uses stock After Effects. Where a plugin would help, it's noted as optional.

> **The interface, super briefly.** Top = menus + toolbar. Left/centre = the **Composition** panel (your canvas). Bottom = the **Timeline** (layers + time). Right = panels like **Effects & Presets**, **Align**, **Character** (for text). If you lose a panel: **Window** menu → tick its name. To reset everything: **Window → Workspace → Reset to Saved Layout.**

---

## 5.0 — Make your first composition (do this once, understand it forever)
1. **Composition → New Composition** (or **Ctrl/Cmd+N**).
2. Set **Width 3840, Height 2160** (or 1920×1080), **Frame Rate 24**, **Duration** to your section length, **Background Color** black or navy. Name it. **OK.**
3. You now have an empty canvas + a timeline. The vertical line in the timeline is the **playhead** — it marks "where in time you are." Drag it, or press **Spacebar** to play.
4. **Make a background:** **Layer → New → Solid**, pick your hex (`#0B1A2C` navy or `#000000` black), OK. This fills the frame. Lock it (the little padlock in the timeline) so you don't move it by accident.
5. **Save now and save often: Ctrl/Cmd+S.** AE crashes. Saving is your seatbelt.

---

## 5.1 — Backgrounds that don't look flat (the radial gradient)
A dead-flat navy reads "cheap." A subtle centre-glow reads "designed."
1. Select your navy solid → **Effect → Generate → Gradient Ramp.**
2. In the **Effect Controls** panel (top-left, appears when an effect is applied): set **Ramp Shape = Radial Ramp.**
3. **Start Color** = a slightly *lighter* navy; **End Color** = your base `#0B1A2C`. Drag **Start of Ramp** to the centre of the frame, **End of Ramp** to a corner.
4. Keep it *subtle* — you should barely notice it. That's the point.

---

## 5.2 — Keyframes, Easy Ease & the Graph Editor (THE core skill)
Animation = "this value here, that value there, AE fills the middle." Here's the whole game on Opacity (a fade-in):
1. Select a layer → press **T** to reveal **Opacity** (each transform property has a shortcut: **P**=Position, **S**=Scale, **R**=Rotation, **T**=Opacity, **A**=Anchor Point).
2. Put the playhead at the start. Click the **stopwatch** ⏱ next to Opacity. *Clicking the stopwatch turns animation ON for that property and drops your first keyframe.* Set Opacity to **0**.
3. Move the playhead forward ~10 frames (press **Page Down** to step frames, or drag). Set Opacity to **100**. AE auto-creates a second keyframe. Play it — it fades in. Congratulations, that's animation.
4. **Now make it premium:** drag-select both keyframes (draw a box around them) → press **F9**. They turn into hourglass shapes = **Easy Ease**. The fade now starts and ends gently instead of robotically.
5. **Fine-tune with the Graph Editor:** click the **Graph Editor** button (graph icon at the top of the timeline). You'll see a curve. For a "slow-in, slow-out" feel, drag the little handles so the curve is flat at both ends and steep in the middle. *This is the difference between "fine" and "expensive."*

> **House easing for this video:** a strong ease-OUT (fast start that glides to a gentle stop) for reveals — it feels like something arriving and settling. Avoid linear (straight-line) graphs entirely.

---

## 5.3 — The "fade + rise" reveal & kinetic typography (your house style)
This single move appears more than any other in the video. Make it a preset.

**The fade+rise (for any text or element):**
1. Select the layer. Press **P** (Position) and **T** (Opacity) — hold **Shift** when pressing the second so both stay visible.
2. At the start: set Opacity **0**, and set Position **~30px below** its final spot (note the Y value, add 30). Turn on both stopwatches.
3. ~10–12 frames later: Opacity **100**, Position at final. 
4. Select all 4 keyframes → **F9**. Graph Editor → ease-out. Done — it fades up and glides into place.
5. **Save it as a preset:** select the animated properties → right-click → **Save Animation Preset** → name it `CSL_FadeRise`. Now one click applies it to anything.

**Kinetic typography (text synced to the voice) — the 2026 premium way:**
The current trend has moved *away* from fast flying captions toward **slow, deliberate chunks** — about **2–4 words held for 0.6–0.9 seconds each**, synced to the voice ([fontmirror on the slower kinetic move](https://www.fontmirror.com/en/typography-trends-shaping-short-form-ai-video-content/)). Showing the words as they're spoken also boosts memory ([videoexplainers on dual-channel retention](https://videoexplainers.com/blog/typography-animation-guide)). This calm pace IS your channel — so:
1. Split a sentence into **short phrases**, each on its own text layer (e.g. "escape the feeling" / "not complete the task").
2. Reveal each phrase with `CSL_FadeRise`, timed so it appears exactly as the VO says it. (Scrub the audio in the timeline to find the precise frame — **drag the playhead while holding Ctrl/Cmd** to hear audio, or tap **. (period)** on the numpad to preview audio.)
3. **Emphasis = colour + size, not speed.** Keep the neutral words off-white; make the key word **gold and ~10–15% larger**, revealed a beat later. That's what makes it feel "edited to the voice."
4. **Hierarchy:** never more than one idea bright at a time. Old phrases can fade to 40% or leave. (Core kinetic principles: timing, easing, hierarchy, and purposeful motion over flashy effects — [ikagency's 2026 motion-text guide](https://www.ikagency.com/graphic-design-typography/kinetic-typography/).)

---

## 5.4 — Type-on / typewriter (text that types itself)
Used in: Step 1's "I'm avoiding this because I feel ___", any "being typed" moment.
- **Easiest way:** select the text layer → in **Effects & Presets** search **"Typewriter"** (under Animation Presets → Text → Animate In) → double-click to apply. It adds two keyframes; drag them to control speed.
- **Manual way (more control):** select text layer → click the **Animate** button (top-right of the layer in the timeline) → **Opacity**. Set the added **Opacity** to 0. Then twirl down **Range Selector 1 → Advanced → Units = Index**, and keyframe **Range Selector → End** from 0 to the number of characters. Characters reveal one by one.
- **Blinking cursor:** make a thin rectangle, and on its Opacity add the expression `Math.round(time*2)%2*100` (blinks twice a second). Expressions explained in [Tech 5.13].
- Sync subtle **keystroke ticks** in Premiere if you want — but for this calm video, often better silent.

---

## 5.5 — THE PEN TOOL: drawing your own shapes & paths from scratch
This is the skill that lets you draw *anything* — the strikethrough lines, the anxiety squiggle, the path that branches, custom icons. It feels awkward for ten minutes, then it's yours forever.

**What the pen tool actually does:** it places **vertices** (anchor points). AE connects consecutive vertices with **segments** (lines). Click for sharp corners; click-and-drag to pull out **bezier handles** that curve the segment. To finish an *open* path (like a line), just stop. To finish a *closed* shape, click back on your first vertex ([nofilmschool's shape-layer primer](https://nofilmschool.com/2018/05/beginners-guide-shape-layers-adobe-after-effects)).

**Step-by-step — draw a path (e.g., a strikethrough line):**
1. **Deselect everything** (F2 or click empty timeline). *Important:* if a layer is selected when you use the pen, AE draws a **mask** on that layer instead of a new shape. For independent art, deselect first so it makes a new **Shape Layer**.
2. Grab the **Pen tool** (toolbar, or press **G**).
3. In the toolbar, set **Fill = none**, **Stroke = your colour** (click the word "Stroke" to pick `#C94A4A` red), **Stroke width ≈ 8–12px**.
4. **Click once on the left** where the line starts, then **click once on the right** where it ends. You've drawn a straight 2-vertex line. Press **V** to switch back to the Selection tool.
5. AE created a **Shape Layer** with this path. Twirl it open in the timeline: **Contents → Shape 1 → Path** (the path itself), plus **Stroke**.

**For curves (the anxiety squiggle, a branching path):** instead of single clicks, **click-and-drag** at each point — dragging pulls bezier handles that bend the line. Short drags = gentle curves; long drags = dramatic ones. To adjust later, use the Selection tool to drag vertices, or hold **Ctrl/Cmd** to grab handles.

**Rounded line ends (looks more premium):** twirl to **Stroke → Line Cap → Round**. Always round your caps for this channel's soft, editorial feel.

> **Anchor point on shape layers:** new shape layers put the anchor at the comp centre, not on your shape — which makes scaling/rotating feel "off." Fix: select the layer → menu **Layer → Transform → (or use) the Pan-Behind/Anchor Point tool (Y)** and drag the anchor onto your shape, OR right-click the layer → **Transform → Center Anchor Point in Layer Content** (newer AE). Do this whenever rotation/scale looks wrong.

---

## 5.6 — Trim Paths: making lines "draw on" (the signature move)
Trim Paths is how the strikethroughs, the gold underline, the equation divider, and the timer circle all *draw themselves on*. Master this once; it's everywhere in this video.
1. Make or select a **Shape Layer** with a path (from [Tech 5.5], or a shape tool, or an SVG [Tech 5.7]).
2. In the timeline, twirl the layer open → click **Contents → Add (the little arrow) → Trim Paths.**
3. Twirl open **Trim Paths 1.** You'll see **Start, End, Offset.**
4. Set **End = 0%** at the start → turn on its stopwatch. Move ~8–10 frames forward → **End = 100%.** The stroke now draws from nothing to complete. (If it draws from the wrong side, animate **Start** from 100→0 instead, or reverse the path direction.)
5. **F9** both keyframes → Graph Editor → ease. 
6. **Multiple paths drawing in sequence** (e.g., several strokes): put them in one shape layer, add Trim Paths to the *group*, and set **Trim Multiple Shapes = Sequentially.**

---

## 5.7 — SVG / vector icons → editable, recolourable shapes
You don't have to draw every icon — import clean SVGs and make them animatable.
1. Drag your **.svg** (or .ai) file into the Project panel, then into your comp.
2. **Newer After Effects** can import SVGs directly as native, editable shape layers ([Adobe on the new native SVG vector workflow](https://community.adobe.com/t5/after-effects-beta-discussions/new-vector-workflow-enhancements-in-after-effects-beta/m-p/15559138)). If yours doesn't, right-click the layer → **Create Shapes from Vector Layer** — this converts it into editable paths.
3. Now every path is editable: change **Fill/Stroke** to your palette (gold `#C9A84A`, off-white `#F2EEE5`, grey-blue `#3A4A5C`).
4. **Standard icon entrance** for this channel: Scale **0→100** *with the smallest hint of overshoot* (e.g. 0→103→100) + a fade, eased. Keep overshoot tiny — this niche is calm, not bouncy.
5. **Icon swap** (e.g., phone → relief): cross-dissolve while the new icon scales 96→100 and the old scales 100→104 and fades.
6. **Recolour to "dim"** (for inactive items): drop Opacity to ~40% or tint toward grey-blue.

---

## 5.8 — The strikethrough & the red X (specific recipes)
**Strikethrough (Scene 00 hook — "Not laziness" etc.):**
1. Pen-tool a straight horizontal line across the text, soft red `#C94A4A`, ~8px, round caps [Tech 5.5].
2. Add **Trim Paths**, animate **End 0→100% over 0.3s**, eased [Tech 5.6]. It "strikes" left→right.
3. Time it to land exactly as the VO says "not laziness." Add a soft **draw** SFX.

**Red X (Scene 03 failed fixes):**
1. Pen-tool **two** short diagonal strokes crossing at the centre (one "\", one "/"), red, round caps.
2. Put both in one shape layer, add **Trim Paths → Trim Multiple Shapes = Sequentially**, animate End 0→100% so the two strokes draw one after the other (quick, ~0.25s total).
3. Keep it dignified — no shaking, no buzzer. Honest, not mocking.

---

## 5.9 — The gold tick / checkmark (the reward moment)
This is the emotional high of the hook — the only fully "positive" mark in the opening. Make it feel warm.
1. Pen-tool a checkmark: **click** the start (left), **click** the bottom of the V, **click** the top-right — a 3-vertex tick. Stroke **gold `#C9A84A`**, ~10–12px, **round caps**, no fill [Tech 5.5].
2. **Draw it on** with Trim Paths (End 0→100%, ~0.4s, eased) [Tech 5.6] **and/or** scale it 80→100 with a gentle ease-out settle. The script says scale 0.8→1 with a soft ease-out bounce — keep the bounce a *whisper* (overshoot to ~104% then settle to 100%), never cartoonish.
3. Add a soft **glow** [Tech 5.12] so the gold feels warm, and a single warm **chime** SFX on completion.
4. The "How the task makes you FEEL" text turns/reveals gold alongside it.

---

## 5.10 — Title / section cards & the logo stinger
Used in: section cards (01–04), the CTA branding.
1. Text layer, **Cormorant Garamond**, gold `#C9A84A`, centred (Align panel → centre H + V).
2. Reveal: `CSL_FadeRise` [Tech 5.3] + optional per-character stagger (Animate → Opacity → Range Selector, offset the **Start**). Hold ~1s.
3. A thin **gold underline draws on** beneath it with Trim Paths [Tech 5.6] — editorial signature.
4. Exit: fade + a small scale-down, OR cut on a beat.
5. **Logo stinger (build once, reuse every video):** "COGNITIVE STRATEGY LAB" with a small geometric mark; animate the mark drawing on (Trim Paths) + text fading up + a subtle light sweep. Save the comp; it's your brand bumper forever.

---

## 5.11 — Citation lower-third / card (your credibility system)
Used in: the Sirois card, any researcher/study mention.
1. Build once: a thin horizontal **bar** (rectangle shape) low or centred, a small **gold tick/accent**, and two/three **text lines** (Name / Institution / source) in Montserrat off-white.
2. Reveal: the bar **wipes on** (animate its Scale X from a left anchor, or use a mask wipe), then the text fades+rises [Tech 5.3]. Hold ~2–3s, fade.
3. Save as a pre-comp template; duplicate and retype for each citation. **Keep position and timing identical every time** — that repetition is what reads as "trustworthy channel."
4. **For this video:** Dr. Fuschia Sirois — Durham University — *Sirois & Pychyl, 2013.* (Verified citation — [Wiley](https://compass.onlinelibrary.wiley.com/doi/abs/10.1111/spc3.12011).)

---

## 5.12 — Glow & soft light (warmth where it matters)
Used in: the gold tick, "the answer" moments, the relief pulse on Path B.
- **Native, no plugin:** select the element → **Effect → Stylize → Glow.** Tune **Glow Radius** and **Glow Intensity** low; set **Glow Colors → A & B Colors** and pick golds so the glow stays warm, not white.
- **Alternative (softer):** duplicate the layer → apply **Effect → Blur & Sharpen → Fast Box Blur** (heavy) → set the blurred copy's blend mode to **Add** or **Screen** → lower its Opacity. Stack the blurred copy *behind* the sharp one = a soft bloom.
- **Keep glow motivated** — only where something is meant to feel warm/important. Glowing everything = amateur.

---

## 5.13 — Expressions: tiny code that animates for you (beginner-safe kit)
An **expression** is one line of code on a property that makes it move automatically — no keyframes. To add one: **Alt/Option-click the stopwatch** ⏱ next to a property; a text field opens; type/paste the expression; click away to apply. To remove: Alt/Option-click the stopwatch again. Here's your whole kit — copy-paste ready ([beginner expression guide](https://robdiaz.com/articles/after-effects-expressions-beginners), [wiggle explained](https://www.spotlightfx.com/blog/mastering-the-wiggle-expression-in-after-effects-a-beginners-guide)):

| Goal | Property | Expression | What it does |
|---|---|---|---|
| Gentle living drift (so "still" shots breathe) | Position | `wiggle(0.3, 8)` | Moves ~8px, ~0.3 times/sec. Numbers = `wiggle(frequency, amount)`. Keep both LOW here. |
| "Live screen" flicker on a glow | Opacity | `wiggle(3, 8)` | Small fast opacity jitter. |
| Endless loop of your keyframes | any keyframed property | `loopOut("cycle")` | Repeats your keyframes forever. `"pingpong"` bounces back and forth; `"offset"` keeps progressing. |
| Blinking text cursor | Opacity | `Math.round(time*2)%2*100` | Snaps between 0 and 100 twice a second. |
| Smooth countup / linked motion | any | `thisComp.layer("CTRL").effect("Slider Control")("Slider")` | Reads a Slider you control (see below). |

**Slider Control (animate many things from one dial — used in the see-saw-style rigs and the card-dimming):**
1. Make a **Null** (Layer → New → Null Object) — an invisible control handle. Rename it `CTRL`.
2. Select it → **Effect → Expression Controls → Slider Control.**
3. On the property you want to drive, Alt-click the stopwatch and type `thisComp.layer("CTRL").effect("Slider Control")("Slider")`.
4. Now keyframing the *one* Slider animates everything linked to it. (You can also link frequency/amplitude of a wiggle to sliders for live control — [robdiaz](https://robdiaz.com/articles/after-effects-expressions-beginners).)

> **Beginner reassurance:** you only need `wiggle`, `loopOut`, and the Slider link for this entire video. Don't fall down the expression rabbit hole — these three cover everything here.

---

## 5.14 — 2D → 3D movement: push-ins, drift, and parallax (premium camera feel)
Subtle camera movement is what makes static graphics feel cinematic. Two levels:

**Level 1 — the fake 2D push-in (easiest, use this 90% of the time):**
1. Select all the layers of your scene → right-click → **Pre-compose** (this groups them into one). 
2. Add a **Null** named `CAM_CTRL`, **parent** the pre-comp to it (in the timeline, drag the little spiral "pick-whip" from the pre-comp's **Parent** column onto the null).
3. Keyframe the null's **Scale** (e.g., 100→108 over 8 seconds) for a slow push-in, and/or **Position** for a drift. **F9** + Graph Editor (very gentle). Because everything's parented, it all moves together cleanly.

**Level 2 — a real 3D camera with parallax (for the hook face / desk depth, optional):**
1. Turn on the **3D switch** (the little cube icon) for the layers you want to have depth.
2. **Layer → New → Camera** (35–50mm is natural). **Layer → New → Null**, turn on its 3D switch, name it `CAM_CTRL`, and **parent the camera to it** (animate the null, not the camera directly — far easier).
3. Spread layers on the **Z axis** (background pushed far back, foreground near). Now when the camera moves, near and far layers shift at different speeds = real depth ("parallax").
4. Add a barely-there idle drift to the camera null's Position: `wiggle(0.3, 8)` [Tech 5.13]. If you can obviously *see* the wiggle, it's too strong.

**2.5D parallax on a still (e.g., bringing a flat image to life):** separate the image into foreground/background layers (in Photoshop, or duplicate + mask in AE), spread them on Z, move the camera. Slow and eased always.

> **For THIS calm video:** mostly use **Level 1**. One slow push-in on a key line (like the equation or a closing recap) is plenty. Over-moving the camera fights the script's stillness.

---

## 5.15 — HERO RIG: the two-path "desk decision" diagram (Scene 01)
The teaching centrepiece of Scene 01. Build it as its own pre-comp so it's reusable.
1. **Set the stage:** navy + gradient [Tech 5.1]. Place a simple **desk + laptop** (icons [Tech 5.7] or basic rounded-rectangle shapes) centred-low. On the laptop "screen," a small **task document** icon.
2. **The trigger feeling:** pen-tool a small **anxiety squiggle** [Tech 5.5] (a jagged line), tint soft red, fade it in above the task. This is "the task makes you feel something."
3. **The branch:** pen-tool **two paths** leaving the desk — one up-left (Path A), one up-right (Path B). Give each **Trim Paths** and draw them on [Tech 5.6], staggered.
4. **Path A (face the task):** ends at a small label "Start the task" — and the anxiety squiggle **stays** (honest: starting doesn't instantly feel good). Keep it neutral/off-white.
5. **Path B (avoid):** a **phone** icon slides in; a **relief pulse** (soft gold glow) flashes [Tech 5.12] then **fades**; then the original **task icon scales up to ~115%** slowly [keyframe Scale, F9, Graph Editor]. That growth is the lesson — avoidance makes the task *bigger*. End with a low, slightly hollow tone.
6. **Control tip:** keep Path A and Path B as two labelled groups so you can reveal them in sync with the VO ("two paths branch…").

---

## 5.16 — HERO RIG: the 5-feelings card stack (Scene 02)
Build **one** card perfectly, then duplicate it five times. This rig also handles the "dim the previous cards to 40%" rule elegantly.

**Build one card:**
1. A **rounded rectangle** (Rounded Rectangle tool — click-hold the shape tool to find it), navy-slightly-lighter fill, optional thin gold stroke. 
2. On it: a big **gold number** (Cormorant Garamond), the **emotion name** (Montserrat, off-white, bold), and a **one-line description** (Montserrat, off-white, smaller).
3. Group all three text layers + the rectangle by selecting them → **Pre-compose** → name it `Card_1`.

**Animate the entrance (the script's exact spec):**
1. On `Card_1`: Position **X from −40px → 0**, Opacity **0 → 100**, over **0.35s**, **ease-OUT** (F9 + Graph Editor) [Tech 5.2]. This is "enters from the left."

**Duplicate & stagger:**
1. Select `Card_1` → **Ctrl/Cmd+D** to duplicate → it becomes `Card_2`. Double-click to enter it and retype the number/name/description. Reposition it below Card 1. Repeat to five cards.
2. **Stagger them by 0.9s:** drag each card's layer bar in the timeline so it starts 0.9s after the previous (or move the playhead in 0.9s steps and align each layer's start there).

**The "dim the old ones to 40%" move (two easy options):**
- **Manual (simplest):** on each card, add an Opacity keyframe that drops it from 100% → 40% at the moment the *next* card begins. Five quick keyframes. Done.
- **Slick (one control):** make a Null `CTRL` with a Slider [Tech 5.13] representing "active card number," and drive each card's opacity by comparing — but honestly, for five cards, the manual way is faster and clearer for a beginner. Use manual.

> Only the current feeling is ever bright. This focus is both the script's instruction and good attention design.

---

## 5.17 — HERO BUILD: the guilt equation (Scene 03)
The emotional gut-punch. Cleanliness sells it.
1. **Three text blocks**, left-aligned, evenly stacked (Montserrat, off-white):
   `Anxiety about the task`
   `+ Self-criticism for not starting`
   `= Even stronger avoidance`  ← this one **soft red `#C94A4A`, ~15% larger**
2. **The divider line:** pen-tool a horizontal line [Tech 5.5] between the second and third blocks; add **Trim Paths** and draw it on left→right [Tech 5.6], grey-blue or off-white.
3. **Sequence the reveal:** line 1 fades+rises [Tech 5.3]; ~0.8s later line 2; then the **divider draws on**; then the red sum fades+rises slightly larger. 
4. **Alignment matters:** turn on **Title/Action Safe** (right-click the comp viewer → Grids & Guides) and use the **Align** panel to keep the `+`, `=`, and the divider lined up. Sloppy alignment is what makes equations look amateur — take the extra two minutes.
5. **Hold the complete equation for 5 seconds.** Music drops out under the hold; a single soft **thud** on the red line. The silence makes it echo.

---

## 5.18 — Small utilities (radial timer, dividers, progress slots)
- **Radial timer (the 2:00 in Step 2):** make an **Ellipse** (no fill, gold stroke, round cap), add **Trim Paths**, animate **End 0→100%**, and **rotate the layer −90°** so it starts at 12 o'clock. A text counter in the centre can count via a Slider [Tech 5.13] or simple hold-keyframes. [Tech 5.6]
- **Progress slots (STEP 1 / STEP 2 filling in):** two faint outlined boxes; each "fills" (a gold fill scales in, or opacity rises) as its step is taught. A quiet reward for watching.
- **Underlines:** any title's gold underline = a pen-tool line + Trim Paths draw-on. [Tech 5.6]

---

## 5.19 — Exporting your finished AE section (so Premiere can use it)
Once a section looks right, render it to a video file:
1. **Composition → Add to Render Queue** (or Add to Adobe Media Encoder Queue for more formats).
2. In the Render Queue: click **Output Module** → choose **QuickTime → ProRes 422 HQ** (Mac) — this is a high-quality, edit-friendly format. On Windows without ProRise, use a high-bitrate H.264 or a lossless intermediate. *If the section needs to layer over something with transparency (rare here), use ProRes 4444 and turn the channel to RGB+Alpha.*
3. Click **Output To** → save into `06_AE_Renders/` with a clear name (e.g. `S02_FiveFeelings_v1.mov`).
4. **Render.** Then drag that `.mov` into Premiere onto track **V2**, aligned to its marker.

> Render at the **same 24fps and resolution** as everything else. Mismatched frame rates are a classic beginner bug that causes stutter.

---


# PART 6 — SOUND, COLOUR, EXPORT, THUMBNAIL, SCHEDULE & QC

## 6.1 Sound design & the final mix (in Premiere)

Sound is **~50% of "premium feel."** Great visuals with a flat mix feel cheap; simple visuals with a great mix feel expensive. For *this* video — which is built on silence — the mix is everything.

**Track plan (from PART 3):** A1 = VO, A2 = Music, A3 = SFX. Keep them separate so you can balance independently.

**Level targets (plain English):**
- **VO is king** — always the clearest, most present element. Aim for VO peaks around **−6 dB**, sitting near **−16 LUFS** on its own.
- **Music sits *under* the voice** — roughly **−18 to −24 dB** while the VO talks. Felt, not heard.
- **Final master: −14 LUFS integrated, true peak ≤ −1 dB.** Check with **Window → Essential Sound** or a loudness meter. −14 LUFS is YouTube's normalisation target, so mastering there means your video won't get auto-quietened.

**Auto-ducking (music drops automatically under the voice — a one-click upgrade):**
1. Select your music clips → open **Essential Sound** panel → tag them as **Music.**
2. Tick **Ducking** → set "Duck against = Dialogue" → adjust **Sensitivity/Reduction** (around −18 to −22 dB) → **Generate Keyframes.** Music now dips when the VO speaks and swells in the gaps automatically ([Adobe on auto-ducking](https://helpx.adobe.com/premiere-pro/using/auto-ducking.html)).

**The manual music moves that matter most in THIS video:**
- **Full silence** (cut the music entirely, quick fade) for: the **5-second hook silence**, the **guilt-equation 5-second hold**, and the **closing line**. The script demands these. Silence is your strongest pattern interrupt for an overstimulated viewer.
- **Swap to the warmer variant** at the start of Scene 04 (the technique) — it quietly signals "problem → solution."
- **Bring the bed back gently** after each silent beat — never let it crash back in.

**SFX discipline:** tag the VO as **Dialogue** in Essential Sound (enables a gentle clarity EQ + optional de-noise). Keep SFX *quiet* — a tick, never a clang. Lay faint **room tone** under the silent beats so they aren't digitally dead (true 0-silence sounds like the file broke). Sync each SFX to the **frame the motion peaks**, not when it starts.

**Mix order:** balance VO alone first → add music + ducking → layer SFX last → final listen on **cheap earbuds / phone speaker** (that's what most of your audience uses).

## 6.2 Colour grade & finishing (one global pass)

Do this **once, globally**, with a single **Adjustment Layer** over the whole timeline (top track) — cleaner than grading each scene.
1. **Layer → New → Adjustment Layer**, stretch it across the entire timeline.
2. Apply **Lumetri Color** (Effects panel).
3. Because every AE scene already used the exact palette hexes, the grade is *polish, not rescue*:
   - **Basic:** a small contrast bump; pull highlights down slightly so gold never clips; lift the blacks a touch for a soft, filmic (non-crushed) look.
   - **Curves:** a gentle S-curve; optionally nudge shadows toward navy and highlights toward warm gold (reinforcing your palette).
   - **Vignette:** Lumetri → Vignette, Amount ≈ −1.0 to −1.5, high Feather. Subtle. Pulls the eye centre.
4. **Film grain (do not skip):** add a grain clip set to **Overlay/Soft Light** at low opacity (~8–12%), or a grain effect on a second adjustment layer. **This kills banding on the dark/black backgrounds — the #1 amateur giveaway on a video with this much black.**
5. Keep it **restrained** — editorial and calm, never an Instagram filter.

## 6.3 Export settings (the YouTube upload file)

**File → Export → Media** (or send to Media Encoder):
- **Format: H.264.**
- **Resolution: 2160p (4K)** if you worked in 4K (YouTube gives it more bitrate, so everyone sees it cleaner), otherwise **1080p**.
- **Frame rate: 24fps** (match your sequence — mismatches cause stutter).
- **Bitrate: VBR, 2-pass.** Target ~**40–45 Mbps** for 4K, ~**16 Mbps** for 1080p (above YouTube's minimums = less re-compression) ([Premiere export settings for YouTube](https://josephnilo.com/blog/best-premiere-pro-export-settings-for-youtube/)).
- **Audio: AAC, 320 kbps, 48 kHz, stereo,** mastered to −14 LUFS.
- Tick **Render at Maximum Depth** and **Use Maximum Render Quality** for clean gradients.

> Keep a high-quality **master** (ProRes or high-bitrate) in `08_Exports/` as your archive; upload the H.264 derivative. After uploading, let YouTube finish processing the HD/4K version *before* going public so early viewers don't see the blurry low-res transcode.

## 6.4 Thumbnail (build in Photoshop / Figma / Canva)

Title + thumbnail decide your click-through rate — spend real time here. The hook says "stop the skip"; the thumbnail's job is to *earn the click* in the first place.
1. Canvas **1280×720** (16:9).
2. Background: **pure black** (echoing the hook — and black thumbnails stand out in a feed of busy ones).
3. **Hero text:** big, in Cormorant Garamond. Strong options that match the script's emotional promise:
   - **"You're not lazy."** (white) + small gold subline **"It's a feeling you haven't named."**
   - or **"The real reason you procrastinate"** with **"real"** in gold.
4. Optional small visual: a single struck-through word **~~Lazy~~** in red with a gold tick beside a calmer word — a one-glance preview of the hook's idea.
5. **Readability rules:** must read on a phone (most views are mobile); ≤ 4–6 words; high contrast; keep the bottom-right corner clean (the timestamp sits there).
6. Make **2–3 variants** to A/B test. Keep the thumbnail text **different** from the video title (they should combine, not repeat).
7. Export under 2MB.

**Suggested title (mass-market hook + science moat, per your strategy doc):** *"Procrastination Isn't Laziness — It's a Brain Glitch (The Real Fix)"* or *"You're Not Lazy — Here's the Real Reason You Procrastinate."*

## 6.5 Derivative content (free reach — don't skip)

While the AE projects are open, export **vertical (1080×1920)** cuts of the highest-impact moments for Shorts/Reels:
- **Reel 1:** the hook — the strikethrough list landing on the gold tick (this is your strongest cold-open).
- **Reel 2:** the 5 feelings card stack (highly self-relatable; great saves/shares).
- **Reel 3:** the "name the emotion → it shrinks" Step 1 beat.
Reframe to 9:16 (recentre key elements), add **burned-in captions** (Shorts are watched muted), end with "full breakdown on the channel." This feeds discovery and the watch-next loop at near-zero extra cost.

## 6.6 Realistic beginner schedule (don't do it in one sitting)

Video that builds your reusable templates always takes longest. Future videos get 2–3× faster because PART 5 is already done.

| Day | Focus | Output |
|---|---|---|
| 1 | Pre-production | VO generated/recorded + cleaned, music/SFX sorted, fonts/icons collected, folders made |
| 2 | Premiere spine | Radio edit locked (eyes-closed test passes), markers placed, pacing confirmed |
| 3 | AE templates (PART 5) | Build the reusable moves ONCE: `CSL_FadeRise`, pen-tool comfort, Trim Paths, citation card, title/logo, glow |
| 4 | AE scenes 00–01 | Hook + "What it actually is" (incl. the two-path desk rig) rendered |
| 5 | AE scenes 02–03 | 5-feelings card stack + the guilt equation rendered |
| 6 | AE scenes 04–06 | The technique + close + CTA rendered |
| 7 | Premiere assembly | Drop all renders in order, J/L cuts, pattern-interrupt check |
| 8 | Sound + colour | Music, ducking, SFX, mix to −14 LUFS, global Lumetri grade + grain |
| 9 | Finish | Thumbnail, export, full watch-through QC, vertical reels |
| 10 | Publish | Upload, metadata, end screens (link the scrolling video), schedule |

**Minimum-viable-premium version (if short on time):** make the **hook, the 5-feelings stack, and the closing line** immaculate, and keep everything else simple. Those three carry the entire "premium" perception for this video.

## 6.7 Final QC checklist (before you publish)

**Visual**
- [ ] Every keyframe eased — zero linear motion on anything the eye tracks
- [ ] No banding on the black/navy backgrounds (grain applied globally)
- [ ] Palette consistent everywhere (black/navy/gold/red/off-white/grey-blue only)
- [ ] Fonts consistent (Cormorant Garamond headings + hook/close; Montserrat body)
- [ ] Hook line + closing line both Cormorant Garamond *italic* on pure black
- [ ] Sirois citation accurate and on screen during Scene 01
- [ ] Only one feeling-card bright at a time (others at 40%)
- [ ] Section cards consistent in position & timing
- [ ] End-screen area kept clear for YouTube's cards (last ~5s)
- [ ] Bookend works: pure-black hook ↔ pure-black close

**Pacing / "don't let them skip"**
- [ ] The 5-second opening silence is intact and uninterrupted (no music, no motion)
- [ ] A pattern interrupt at least every ~60s
- [ ] J/L cuts used — VO and visuals not all cutting on the same frame
- [ ] Music drops to true silence on the hook, the equation hold, and the close
- [ ] Watch the whole thing once at 1× without touching anything — cut any moment you get bored or check the time

**Audio**
- [ ] VO always clearly on top, intelligible on a phone speaker
- [ ] Ducking working (music dips under VO)
- [ ] Master at −14 LUFS, true peak ≤ −1 dB
- [ ] Faint room tone under the "silent" beats (not dead-digital silence)
- [ ] SFX subtle, synced to motion peaks, never clangy

**Publish**
- [ ] Thumbnail readable at tiny size; text ≠ title
- [ ] Title + description (first 2 lines = the hook), chapters/timestamps in description
- [ ] End screen links the scrolling video (CSL 002) → the watch-next loop
- [ ] 4K/HD processing finished before going public

---

# APPENDIX — WHY THIS PRODUCTION STYLE WORKS (the strategy, in one place)

- **Motion graphics over stock footage** = a unique, ownable look that survives YouTube's crackdown on low-effort template/AI videos, and suits the 2026 system's preference for satisfaction and session depth ([outlierkit on the 2026 satisfaction-first algorithm](https://outlierkit.com/resources/youtube-viewer-satisfaction-algorithm-2026/)).
- **The first 30 seconds are now a core ranking input** — so a hook built on an unskippable 5-second silence + a direct accusation is exactly right ([outlierkit script structure](https://outlierkit.com/resources/youtube-script-writing/); [content creators retention playbook — spend ~half your effort on the opening](https://contentcreators.com/resources/toolkit/youtube-retention-playbook)).
- **Slow, deliberate kinetic typography (2–4 words, ~0.6–0.9s each)** is both the current premium trend and the perfect match for a calm psychology channel ([fontmirror on the slower kinetic move](https://www.fontmirror.com/en/typography-trends-shaping-short-form-ai-video-content/); [ikagency: timing/easing/hierarchy over flashy effects](https://www.ikagency.com/graphic-design-typography/kinetic-typography/)).
- **Showing the words while the voice says them** boosts memory — and for a video about *naming feelings*, making people read the feeling words is doubly powerful ([videoexplainers on dual-channel retention](https://videoexplainers.com/blog/typography-animation-guide)).
- **Silence + pattern interrupts** re-grab attention from an overstimulated audience; this video weaponises silence more than most.
- **Eased motion + film grain + J/L cuts** = the invisible polish that separates "premium" from "hobby."
- **Reusable PART 5 templates** = this video builds the system once; videos #3+ get dramatically faster.
- **The CTA loop into the scrolling video** = "same brain, different trap" creates a deliberate watch-next path, feeding the session-depth metric the algorithm rewards.

## Citations shown in the video (keep accurate)
1. **Sirois, F. & Pychyl, T. (2013).** *Procrastination and the Priority of Short-Term Mood Regulation: Consequences for Future Self.* Social and Personality Psychology Compass. The exact source for "procrastination is emotion regulation, not time management." ([Wiley](https://compass.onlinelibrary.wiley.com/doi/abs/10.1111/spc3.12011))
2. **Affect labelling** (naming an emotion reduces its intensity) — the established emotion-regulation principle behind Step 1.

## Sources consulted for this production plan (research-rephrased for compliance)
- [outlierkit — YouTube 2026 satisfaction algorithm](https://outlierkit.com/resources/youtube-viewer-satisfaction-algorithm-2026/) and [2026 script structure / pattern interrupts](https://outlierkit.com/resources/youtube-script-writing/)
- [contentcreators — retention playbook (effort on the opening)](https://contentcreators.com/resources/toolkit/youtube-retention-playbook); [prapermedia — first-30-seconds hooks](https://prapermedia.com/blog/youtube-first-30-seconds-hook/); [automateed — hook/first-frame design](https://www.automateed.com/social-caption-formulas)
- [fontmirror — slower, deliberate kinetic captions](https://www.fontmirror.com/en/typography-trends-shaping-short-form-ai-video-content/); [ikagency — 2026 motion-text principles](https://www.ikagency.com/graphic-design-typography/kinetic-typography/); [videoexplainers — dual-channel retention](https://videoexplainers.com/blog/typography-animation-guide)
- [Adobe — shape layers, paths & vector graphics](https://helpx.adobe.com/after-effects/using/overview-shape-layers-paths-vector.html); [Adobe — native SVG vector workflow](https://community.adobe.com/t5/after-effects-beta-discussions/new-vector-workflow-enhancements-in-after-effects-beta/m-p/15559138); [nofilmschool — shape layers / pen tool basics](https://nofilmschool.com/2018/05/beginners-guide-shape-layers-adobe-after-effects)
- [robdiaz — After Effects expressions for beginners](https://robdiaz.com/articles/after-effects-expressions-beginners); [spotlightfx — the wiggle expression](https://www.spotlightfx.com/blog/mastering-the-wiggle-expression-in-after-effects-a-beginners-guide)
- [Adobe — J cuts and L cuts](https://helpx.adobe.com/uk/premiere-pro/using/perform-j-and-l-cuts.html); [Adobe — auto-ducking audio](https://helpx.adobe.com/premiere-pro/using/auto-ducking.html); [josephnilo — Premiere export settings for YouTube](https://josephnilo.com/blog/best-premiere-pro-export-settings-for-youtube/)
- [Sirois & Pychyl 2013 — primary research](https://compass.onlinelibrary.wiley.com/doi/abs/10.1111/spc3.12011)

*Content was rephrased for compliance with licensing restrictions.*

---

*Production plan prepared for: Cognitive Strategy Lab — Procrastination video*
*Status: Ready to produce (pairs with your "First 45 Seconds — Stop the Skip" voiceover script)*
*Style: Premium faceless motion-graphics explainer — calm, editorial, emotionally-led*
*Companion file to: CSL_Video_Why_You_Cant_Stop_Scrolling_PRODUCTION_PLAN.md (CSL 002 — the watch-next loop)*
*Version: 1.0*
