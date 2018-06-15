#-------------------------------------------------
#
# Project created by QtCreator 2018-05-31T12:06:50
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = burger
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    connectiondb.cpp \
    theme.cpp \
    question.cpp \
    score.cpp \
    partie.cpp \
    user.cpp \
    reponse.cpp

HEADERS  += mainwindow.h \
    connectiondb.h \
    theme.h \
    question.h \
    score.h \
    partie.h \
    user.h \
    reponse.h

FORMS    += mainwindow.ui

RESOURCES += \
    image.qrc

DISTFILES +=

LIBS += -lmysqlcppconn

CONFIG += c++11
