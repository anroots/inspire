LibreOffice developer shows prototype Android and HTML5 ports
By Ryan Paul | Published about 11 hours ago
The Document Foundation (TDF) announced plans last year to create mobile and cloud versions of LibreOffice. A preliminary iOS porting effort that was undertaken earlier in 2011 demonstrated the viability of the project and showed that the open source office suite could have a future beyond the desktop.

In a presentation this week at the FOSDEM conference, SUSE developer Michael Meeks shed some light on the current status of the porting project. The presentation slides, which he published on his blog, offer insight into some of the underlying technical details and the rationale for some of the high-level design decisions.

Reusing code

The LibreOffice developers aim to maximize the amount of code that is shared between the desktop, mobile, and cloud variants of the office suite. Instead of rewriting the software or maintaining separate implementations, the existing code base will be adapted to work in new environments.

Due to the inherent complexity and sophistication of an office suite, writing a separate version for each environment or rewriting from scratch in a form that is more conducive to portability would be impractical. Meeks cited several examples of failed o