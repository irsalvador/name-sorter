# Name Sorter

A PHP CLI application that reads a list of names from a file, sorts them alphabetically (by last name), and outputs the sorted list to a file and/or the console.

The project uses a **service-layer architecture** with `NameReader`, `NameSorter`, and `NameWriter` services, demonstrating clean, reusable, and testable OOP design.

---

## Features

* Read names from a text file.
* Sort names alphabetically (case-insensitive).
* Output sorted names to a file and console.
* Modular OOP design using service layers.
* CLI executable for easy usage.

---

## Setup

1. **Clone the repository**

```bash
git clone <repository_url>
cd <repository_directory>
```

2. **Install dependencies using Composer**

```bash
composer install
```

3. **Ensure the `bin/name-sorter` script is executable**

```bash
chmod +x bin/name-sorter
```

4. **Prepare an input file**
   Create a text file with one name per line, for example:

```
John Doe
Jane Smith
Alice Johnson
```

---

## Usage

Run the CLI script with the input file:

```bash
php bin/name-sorter <input_file> [output_file]
```

* `<input_file>` → Required. The file containing unsorted names.
* `[output_file]` → Optional. The file to save the sorted names. Defaults to `sorted-names-list.txt`.

**Example:**

```bash
php bin/name-sorter unsorted-names.txt
php bin/name-sorter unsorted-names.txt my-sorted-names.txt
```

The sorted names will also be printed to the console.

---

## Project Structure

```
bin/
 └─ name-sorter       # CLI entry point
src/
 └─ Application.php   # Main application class for loading, sorting, outputting names
vendor/               # Composer dependencies
composer.json
```

---

## Notes for Reviewer

* Default output file is `sorted-names-list.txt` if no output file is provided.
* Error handling is included for missing or invalid input files.

---
