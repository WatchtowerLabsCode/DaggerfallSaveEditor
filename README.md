# Daggerfall Unity Save Editor

A browser-based save editor for [Daggerfall Unity](https://www.dfworkshop.net/), the open-source recreation of The Elder Scrolls II: Daggerfall. Edit your save files directly in the browser — no install, no dependencies, no build step.

**Live at:** [https://watchtowerlabs.net/daggerfall/](https://watchtowerlabs.net/daggerfall/)

## Features

### Character Editing
- Name, race, class, level, and gold
- All 8 primary attributes (Strength, Intelligence, Willpower, Agility, Endurance, Personality, Speed, Luck)
- Health, fatigue, and magicka (current and max values)

### Skills
- View and edit all skill values
- Drag-and-drop skill reassignment between Primary, Major, and Minor categories
- Touch support for mobile devices

### Inventory Management
- Browse player and wagon inventories
- Add items from a template library (weapons, armor, clothing, potions, ingredients, and more)
- Delete unwanted items

### Afflictions
- Add or remove vampirism with clan selection
- Add or remove lycanthropy
- Clear poison and disease effects

### Class Conversion
- Convert between all 18 standard Daggerfall classes
- Preview skill remapping before committing changes

### Advanced Editing
- Active effect bundle editing (JSON)
- Spellbook editing (JSON)
- Global variables editing (JSON)
- Resistance values

## Usage

1. Open `daggerfall.html` in any modern browser
2. Upload your `SaveData.txt` or `.json` file from a Daggerfall Unity save
3. Edit whatever you need across the various tabs
4. Click **Save and Download Changes** to download your modified save
5. Replace the original save file and load it in Daggerfall Unity

### Where are Daggerfall Unity saves?

Save files are typically located at:
- **Windows:** `%AppData%/LocalLow/Daggerfall Workshop/Daggerfall Unity/Saves/`
- **Linux:** `~/.config/unity3d/Daggerfall Workshop/Daggerfall Unity/Saves/`
- **macOS:** `~/Library/Application Support/Daggerfall Workshop/Daggerfall Unity/Saves/`

Each save slot is a numbered folder (e.g., `Save0/`, `Save1/`). The file you need is `SaveData.txt` inside the slot folder.

## Project Structure

```
daggerfall/
├── daggerfall.html     # The entire application (single self-contained file)
├── favicon.png         # Site favicon
├── api/
│   └── submit-save/
│       └── index.php   # Anonymous save data collection endpoint
├── saves/              # Server-side storage for submitted saves
│   └── .htaccess       # Blocks direct web access to saved files
├── CLAUDE.md           # AI assistant project context
└── README.md
```

## Hosting

The app is a single HTML file — open it directly in a browser or serve it from any web server. No build step or package manager required.

For the hosted version at watchtowerlabs.net, it runs on an Apache-PHP container behind an Nginx Proxy Manager reverse proxy.

## License

2026 Watchtower Labs
