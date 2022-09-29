# WebEngineering SOSE 2022 Infoscreen - Claas Hein, Jay Rehder, Niklas Horn

# Notizen:

# Wir haben nur Laravel für das Backend benutzt. Javascript mit Vuejs haben wir gewusst nicht weiter verwendet, auch wenn Rest-Codeschnippsel von Vuejs durchaus in dem Projekt vorhanden sein können. 

# Beim Migraten am besten direkt den Befehl: "php artisan migarte:fresh --seed" ausführen

# Es werden ein paar Dummy-Daten geladen, welche einfach zur Darstellung vieler unserer Features gebraucht werden. Diese können über den Admin-Bereich in dem generierten User: "BENUTZERNAME" = admin "PASSWORD" = admin123 gelöscht oder bearbeitet werden.

# Sie können sich unter website_name/login anmelden und werden direkt auf ein Dashboard geleitet, welches, bis auf die Verlinkung zum Adminbereich, jeder Nutzer nach dessen Einloggen sehen können.
 
# Der Admin kann alle Gebäude, Räume, Module und Studiengänge selbstständig anlegen. Dieser Schritt ist besonders wichtig, da Professoren-User nur Veranstaltungen zu ihren zugewiesenen Modulen machen können.

# Außerdem können User angelegt werden, welche mit den Rollen "Professor" und "Admin" bestückt werden können. Admin User, können genauso viel bearbeiten, wie sie es in dem admin-Account können. Allerdings können Admin-Accounts, welche so angelegt wurden noch gelöscht werden. Der admin-Account allerdings nicht.
