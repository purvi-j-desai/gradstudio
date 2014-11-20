import smtplib
import re

from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

feedback_links = {"outline":"https://www.peerstudio.org/assignments/39", "review":"https://www.peerstudio.org/assignments/44"}

email_subject = "Hello from GradStudio!"
email_body_1 = open("email_part1.html").read()

email_body_2 = open("email_part2.html").read()

fromaddr = 'GradStudioProject@gmail.com'



data = open('send_reminder_nov.txt').read()[:-1]
people_to_remind = {}

print data
for s in data.split('\n'):
    tokens = s.split()
    people_to_remind[tokens[1]] = (tokens[0])

print people_to_remind

people_already_in = open("peerstudio_gradstudio_people.txt").read().split("\n")[:-1]

username = 'GradStudioProject@gmail.com'
password = '*************'
server = smtplib.SMTP('smtp.gmail.com:587')
server.ehlo()
server.starttls()
server.login(username,password)

count = 0
for people in people_to_remind.items():
    if people[0] in people_already_in:
        print people[0], "is already in!\n"
    else:
        toaddrs  = people[0]
        msg = MIMEMultipart('alternative')
        msg['Subject'] = email_subject
        msg['From'] = fromaddr
        msg['To'] = toaddrs

        print people[0], " gets link ", feedback_links[people[1]], "\n"
        email_link = "<a href=\"%s\">%s</a>" %(feedback_links[people[1]], feedback_links[people[1]])
        part_html = MIMEText(email_body_1 + email_link + email_body_2, 'html')
        msg.attach(part_html)
        #server.sendmail(fromaddr, toaddrs, msg.as_string())
        count += 1

print count
server.quit()


