<div align="center">

<img src="assets/logo.png" alt="Khadamni logo" width="180"/>

# Khadamni

### *Le premier pas vers le succès*

**A recruitment and jobs platform dedicated to computer science students.**
Find internships and jobs, take proficiency tests, attend events, and build your professional network, all in one place.

[🌐 www.khadamni.tn](https://www.khadamni.tn) · [📧 Contact](mailto:kadamni@gmail.com)

</div>

---

## 📣 Poster

<div align="center">

<img src="assets/poster.png" alt="Khadamni poster: Le futur numérique vous attend. Prêt à démarrer?" width="900"/>

</div>

---

## 📖 Table of Contents

- [About the project](#-about-the-project)
- [Preview](#-preview)
- [Modules & features](#-modules--features)
- [Diagrams](#-diagrams)
- [Graphic charter](#-graphic-charter)
- [Getting started](#-getting-started)
- [Contact](#-contact)

---

## 🎯 About the project

**Theme:** Recruitment and jobs
**Subject:** Explore a new world of career possibilities with a dedicated platform for computer science students.

Khadamni is a website that makes it easier for computer science students to find jobs or internships, online or in person. It offers professional opportunities and a professional network, adapted to the digital market.

It goes beyond a simple job or internship search in IT: it aims to **empower students and foster their professional growth**.

### Who uses it?

The platform adapts the experience to the user's role, with specific access permissions for each:

| Role | What they can do |
|------|------------------|
| 🎓 **Student** | Build a CV, apply to offers, take tests, join events, post on the blog, file claims |
| 🏢 **Company** | Post job/internship offers, review applications, select candidates, schedule interviews |
| 🛠️ **Administrator** | Manage users, events, content and statistics from the back office |

---

## 🖼️ Preview

### Front office

<p align="center">
  <img src="assets/front-office.png" alt="Khadamni front office templates" width="800"/>
</p>

### Login

<p align="center">
  <img src="assets/login.png" alt="Khadamni login page" width="600"/>
</p>

---

## 🧩 Modules & features

| # | Module | Description | Tables | Key features |
|---|--------|-------------|--------|--------------|
| 1 | **User management** | Role-based experience (administrator, student, company) with specific access permissions | `entreprise`, `étudiant`, `administrateur` | CRUD · Search · PDF export · Statistics · Forgot password · Session · Account blockage |
| 2 | **Event management** | Organize recruitment events: job fairs, webinars, networking sessions, training workshops | `catégorie`, `évènement`, `participation` | CRUD · Search · Notifications · Map |
| 3 | **Demand / Supply management** | Centralized platform where students apply online and companies post offers, review applications and select top candidates | `domaine`, `offre`, `demande` | CRUD · Search · Sort · Statistics · SMS · CV maker · Print CV |
| 4 | **Interview management** | Candidates complete a form and take a proficiency quiz; companies pick the best candidates for an in-person or online interview | `test`, `entretien` | CRUD · Search · Statistics · Quiz score · QR code · Export certificate |
| 5 | **Claims management** | Complaint handling to resolve user issues quickly and proactively | `réclamation`, `réponse` | CRUD · Search · Sort · Chatbot · Bad-words filter |
| 6 | **Blog management** | Publishing and management of articles, comments and tags | `blog`, `comment` | CRUD · Search · Sort · Like / Dislike · Statistics |

---

## 📐 Diagrams

- [Platform overview](#1-platform-overview)
- [Use cases by role](#2-use-cases-by-role)
- [Authentication flow](#3-authentication-flow)
- [Job application flow](#4-job-application-flow)
- [Interview & test flow](#5-interview--test-flow)
- [Event participation flow](#6-event-participation-flow)
- [Claims flow](#7-claims-flow)
- [Class diagram](#8-class-diagram)
- [Entity-relationship diagram](#9-entity-relationship-diagram)

### 1. Platform overview

```mermaid
flowchart TB
    V["Visitor"] --> FO["Front office<br/>Home · Evenement · Offres&Demandes · Entretien · Blog · Reclamation"]
    FO --> AUTH{"Login / Sign up"}
    AUTH --> S["Student space"]
    AUTH --> C["Company space"]
    AUTH --> A["Admin back office"]

    S --> M2["Events"]
    S --> M3["Offers & Requests"]
    S --> M4["Interviews & Tests"]
    S --> M5["Claims"]
    S --> M6["Blog"]

    C --> M2
    C --> M3
    C --> M4
    C --> M6

    A --> M1["User management"]
    A --> M2
    A --> M3
    A --> M4
    A --> M5
    A --> M6
    A --> ST["Statistics"]

    M1 & M2 & M3 & M4 & M5 & M6 --> DB[("Database")]
```

### 2. Use cases by role

```mermaid
flowchart LR
    ST(("Student"))
    CO(("Company"))
    AD(("Admin"))

    subgraph Platform["Khadamni platform"]
        U1["Create account / Log in"]
        U2["Reset forgotten password"]
        U3["Search & sort offers"]
        U4["Apply to an offer"]
        U5["Build & print CV"]
        U6["Take proficiency quiz"]
        U7["Export certificate / QR code"]
        U8["Join an event"]
        U9["Read, comment & like blog posts"]
        U10["Submit a claim"]
        U11["Post job / internship offers"]
        U12["Review applications"]
        U13["Select candidates & schedule interviews"]
        U14["Manage users & block accounts"]
        U15["Manage events & categories"]
        U16["Answer claims"]
        U17["Moderate blog & filter bad words"]
        U18["View statistics"]
    end

    ST --> U1 & U2 & U3 & U4 & U5 & U6 & U7 & U8 & U9 & U10
    CO --> U1 & U2 & U11 & U12 & U13 & U8
    AD --> U1 & U14 & U15 & U16 & U17 & U18
```

### 3. Authentication flow

```mermaid
flowchart TD
    A(["Open login page"]) --> B["Enter email & password"]
    B --> C{"Valid credentials?"}
    C -- No --> D["Show error"]
    D --> E{"Forgot password?"}
    E -- Yes --> F["Send reset link by email"] --> G["Set new password"] --> B
    E -- No --> B
    C -- Yes --> H{"Account blocked?"}
    H -- Yes --> I["Access denied"]
    H -- No --> J["Start session"]
    J --> K{"Role?"}
    K -- Student --> L["Student space"]
    K -- Company --> M["Company space"]
    K -- Admin --> N["Back office dashboard"]
```

### 4. Job application flow

```mermaid
sequenceDiagram
    actor Co as Company
    participant P as Khadamni
    actor St as Student

    Co->>P: Post an offer (domain, type, location, deadline)
    P-->>St: Notification: new offer
    St->>P: Search / sort offers
    St->>P: Apply (motivation letter + CV)
    Note over St,P: CV can be generated with the CV maker
    P-->>Co: Notification: new application
    Co->>P: Review applications
    alt Candidate selected
        Co->>P: Accept and request interview
        P-->>St: SMS / notification: accepted
    else Not selected
        Co->>P: Reject
        P-->>St: Notification: rejected
    end
```

### 5. Interview & test flow

```mermaid
flowchart LR
    A["Candidate fills in form"] --> B["Takes proficiency quiz"]
    B --> C["Quiz score computed"]
    C --> D["Company reviews results"]
    D --> E{"Qualified?"}
    E -- No --> F["Candidate notified"]
    E -- Yes --> G["Interview scheduled<br/>in person or online"]
    G --> H["Interview takes place"]
    H --> I["Certificate exported<br/>with QR code"]
```

### 6. Event participation flow

```mermaid
flowchart TD
    A["Admin creates event category"] --> B["Admin creates event<br/>(name, address, date)"]
    B --> C["Event published<br/>and shown on map"]
    C --> D["Users receive notification"]
    D --> E["Student registers"]
    E --> F[("Participation saved")]
    F --> G["Event day:<br/>job fair · webinar · networking · workshop"]
```

### 7. Claims flow

```mermaid
sequenceDiagram
    actor U as User
    participant B as Chatbot
    participant P as Khadamni
    actor A as Admin

    U->>B: Ask a question
    B-->>U: Automatic answer
    alt Issue not solved
        U->>P: Submit a claim
        P->>P: Filter bad words
        P-->>A: New claim
        A->>P: Write a response
        P-->>U: Notification with the response
    end
```

### 8. Class diagram

<p align="center">
  <img src="assets/class-diagram.png" alt="Khadamni class diagram" width="900"/>
</p>

`User` is the parent class of `Admin`, `Entreprise` and `Etudiant`:

```mermaid
classDiagram
    class User {
        +String nom_utilisateur
        +String email
        +String motDePasse
        +Date dateDeNaissance
        +int phone
    }
    class Admin {
        +int adminId
        +String role
        +String departement
        +int phoneFix
    }
    class Entreprise {
        +int recruteurId
    }
    class Etudiant {
        +int etudiantId
        +String universite
        +String promotion
        +String specialisation
        +String cv
    }
    User <|-- Admin
    User <|-- Entreprise
    User <|-- Etudiant
```

### 9. Entity-relationship diagram

```mermaid
erDiagram
    USER ||--o| ADMIN : is
    USER ||--o| ENTREPRISE : is
    USER ||--o| ETUDIANT : is

    CATEGORIE ||--o{ EVENEMENT : classifies
    EVENEMENT ||--o{ PARTICIPATION : has
    ETUDIANT ||--o{ PARTICIPATION : joins

    DOMAINE ||--o{ OFFRE : groups
    ENTREPRISE ||--o{ OFFRE : publishes
    OFFRE ||--o{ DEMANDE : receives
    ETUDIANT ||--o{ DEMANDE : submits

    ETUDIANT ||--o{ RECLAMATION : files
    RECLAMATION ||--o{ REPONSE : gets

    USER ||--o{ POST : writes
    POST ||--o{ COMMENTAIRE : has

    TEST ||--o| ENTRETIEN : leads_to

    CATEGORIE {
        int idcategorieEVN PK
        string nomCategorieEVN
    }
    EVENEMENT {
        int idevenement PK
        string nomevenement
        string adresseEvn
        date dateEVN
        int idcategorieEVN FK
    }
    PARTICIPATION {
        int idparticipation PK
        int idEvenement FK
        int idEtudiant FK
    }
    DOMAINE {
        int id_dom PK
        string domaine_informatique
    }
    OFFRE {
        int id_o PK
        int id_dom FK
        string titre
        string description_o
        string type_o
        string lieu
        date date_publication
        date date_limite
        string contact
        int status_o
    }
    DEMANDE {
        int id_d PK
        int id_o FK
        int idEtudiant FK
        string lettre_motivation
        string cv_d
        date date_d
        string status_d
    }
    TEST {
        int id_test PK
        string email_test
        date date_test
        string nom_entreprise_test
        string domaine_informatique_test
        int verif
    }
    ENTRETIEN {
        int id_entre PK
        int id_test FK
        date date_entre
        string type_entre
    }
    RECLAMATION {
        int id_reclamation PK
        date date
        string categorie_reclamation
        string explication
        int idEtudiant FK
    }
    REPONSE {
        int id_reponse PK
        string reponse
        int id_reclamation FK
    }
    POST {
        int id_post PK
        string titre
        string contenu
        string auteur
        string tags
        int likes
        int dislikes
        string image
    }
    COMMENTAIRE {
        int id_comment PK
        int id_post FK
        string contenu
        string pseudo
        date datePublication
        int likes
    }
```

---

## 🎨 Graphic charter

| Element | Value |
|---------|-------|
| **Primary red** | Used for the "DAMNI" part of the logo, CTAs and accents |
| **Primary blue** | Used for the "KHA" part of the logo, highlights and links |
| **Typography** | Poppins |
| **Slogan** | *Le premier pas vers le succès* |

---

## 🚀 Getting started

<!-- TODO: adapt this section to your real stack and commands. -->

```bash
# 1. Clone the repository
git clone https://github.com/<your-username>/khadamni.git
cd khadamni

# 2. Install dependencies
# e.g. composer install / npm install

# 3. Configure your environment
cp .env.example .env

# 4. Set up the database
# e.g. php artisan migrate --seed

# 5. Run the project
# e.g. php artisan serve
```

---

## 📬 Contact

| | |
|---|---|
| 📞 Phone | +216 71001002 |
| 🌐 Website | [www.khadamni.tn](https://www.khadamni.tn) |
| 📧 Email | kadamni@gmail.com |
| 📱 Social | @khadamni |

---

<div align="center">

**Khadamni** · *Le premier pas vers le succès* 🚀

</div>
