# WebEngineering SOSE 2022 Infoscreen - Claas Hein, Jay Rehder, Niklas Horn

Notizen:

Wir haben nur Laravel für das Backend benutzt. Javascript mit Vuejs haben wir gewusst nicht weiter verwendet, auch wenn Rest-Codeschnippsel von Vuejs durchaus in dem Projekt vorhanden sein können. 

Beim Migraten am besten direkt den Befehl: "php artisan migarte:fresh --seed" ausführen

Es werden ein paar Dummy-Daten geladen, welche einfach zur Darstellung vieler unserer Features gebraucht werden. Diese können über den Admin-Bereich in dem generierten User: "BENUTZERNAME" = admin "PASSWORD" = admin123 gelöscht oder bearbeitet werden.

Sie können sich unter website_name/login anmelden und werden direkt auf ein Dashboard geleitet, welches, bis auf die Verlinkung zum Adminbereich, jeder Nutzer nach dessen Einloggen sehen können.
 
Der Admin kann alle Gebäude, Räume, Module und Studiengänge selbstständig anlegen. Dieser Schritt ist besonders wichtig, da Professoren-User nur Veranstaltungen zu ihren zugewiesenen Modulen machen können.

Außerdem können User angelegt werden, welche mit den Rollen "Professor" und "Admin" bestückt werden können. Admin User, können genauso viel bearbeiten, wie sie es in dem admin-Account können. Allerdings können Admin-Accounts, welche so angelegt wurden noch gelöscht werden. Der admin-Account allerdings nicht.

Empfohlene Schritte zum Testen von Daten:

1. Loggen Sie sich als Admin auf dem Login-Screen ein: localhost/login (Login-daten für den Testadmin sind: BENUTZER: admin PASSWORD: admin123)
2. Drücken Sie oben im Reiter auf "Mein Adminbereich".
3. Legen Sie ein neues Gebäude mit einem beliebigen Namen an
4. Legen Sie einen neuen Studiengang an
5. Legen Sie neue Räume in dem Gebäude an (Sie können auch Räume wie Lobby oder Eingang anlegen - grundlegend sollten hier allerdings keine Veranstaltungen angebunden werden! - Wenn keine Veranstaltungen in einem Raum eingetragen sind, wird die Twitter-timeline des Twitter-Accounts der Hochschule Flensburg angezeigt.)
6. Legen Sie neue User als Professoren an
7. Legen Sie ein paar neue Module an und weisen Sie diese den Professoren zu (beim Anlegen!)
8. Wechseln Sie auf das normale User-Dashboard, indem sie auf den Schriftzug: "Infoscreen Hochschule Flensburg" drücken.
9. Legen Sie einen Post an. (optional mit Bild ihrerer Wahl.)
10. Wechseln Sie zum Adminbereich
11. Verknüpfen Sie einen Post mit einem Gebäude (News verlinken mit Gebäude)
  
Sie können im Adminbereich im oberen Reiter jeder Zeit Module, Posts, News, Räume, Gebäude, Studiengänge und User löschen (oder ggf. bearbeiten).
Beachten Sie beim Löschen von Elementen, dass ggf. Relationen gelöscht werden. (z.B. wenn Sie einen Studiengang löschen, werden auch alle zugehörigen Module gelöscht, usw.)
  
12. Loggen Sie sich bitte aus dem Admin-Account aus.
13. Loggen Sie sich bitte in einem der Professoren-Accounts ein.
14. Legen Sie eine Veranstaltung an.
15. Erstellen Sie einen Post (optional mit Bild)
16. Verlinken Sie News mit einem Modul.

Sie können im Userbereich im oberen Reiter jeder Zeit Veranstaltungen, Posts und News löschen (oder ggf. bearbeiten).

17. Loggen Sie sich aus dem Account aus.
18. Drücken Sie auf dem Login-Screen auf den Button "Raumübersicht"
19. Wählen Sie einen Raum aus, für den Sie Veranstaltungen und News ausgewählt haben.

Wir hoffen, dass Sie durch diese kleine Anleitung einen groben Überblick über den Aufbau unserer Website erhalten haben.
