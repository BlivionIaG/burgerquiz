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
    theme.cpp

HEADERS  += mainwindow.h \
    ../Bureau/c++/II/tp 6/ElementBDD.h \
    connectiondb.h \
    theme.h \
    question.h

FORMS    += mainwindow.ui

RESOURCES += \
    image.qrc

DISTFILES +=

LIBS += -lmysqlcppconn
