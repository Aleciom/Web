Attribute VB_Name = "Testes"
Sub teste0()
  Dim i As New clsInterface, conf As New clsConfig
  Dim issuel As New clsIssueList, attl As New clsAttrList
  Dim listV As New collection
  '---
  With conf
    .SetFirstHour: .LoadPublicValues
  End With
  With issuel
    .LoadIssue conf
  End With
  With attl
    .LoadAttributes conf
  End With
  i.SetFrmArticle issuel, attl, "text"
  i.ShowFrmArticle conf
  If frmArticle.flagOK = True Then
    i.ExitFrmArticle conf, attl, issuel
  End If
  i.EndFrmArticle
  
  Set i = Nothing: Set issuel = Nothing
  Set attl = Nothing: Set conf = Nothing
  Set listV = Nothing
End Sub

Sub teste1()
  Dim linkl As New clsLkList, i As New clsInterface
  Static attl As New clsAttrList
  Dim c As New clsConfig, m As New clsMarkup
  Dim listbar As New clsListBar
  '-------------------------
  With c
    .LoadPublicValues
  End With
  With attl
    If .ReturnCount = 0 Then
      .LoadAttributes c
    End If
  End With
  With linkl
    .LoadLink c
  End With
  listbar.LoadBars c
  With i
    If listbar.ReturnBar("article").ReturnButton("front").GetAttrib = True Then
      '.SetFrmAttribute attl, linkl, "keyword"
      .ShowFrmAttribute c
      If frmAttribute.flagOK = True Then
        .ExitFrmAttribute attl
        m.InsertTag "keyword", 6, c, attl, linkl, i
      End If
      'MsgBox .attributeI & Space(1) & .attributeII & Space(1) & .attributeIII
      .EndFrmAttribute
    Else
      m.InsertTag "front", 6, c, attl, linkl, i
    End If
  End With
  Set i = Nothing 'Set attL = Nothing
  Set linkl = Nothing: Set m = Nothing: Set listbar = Nothing
End Sub

Sub teste2()
  Dim m As New clsMarkup
  '---------------------
  m.FormatText ActiveDocument.range, 5
  Set m = Nothing
End Sub

Sub teste3()
  Dim i As New clsInterface, conf As New clsConfig
  Dim issuel As New clsIssueList, attl As New clsAttrList
  Dim m As New clsMarkup
  
  With conf
    .SetFirstHour: .LoadPublicValues
  End With
  With issuel
    .LoadIssue conf
  End With
  With attl
    .LoadAttributes conf
  End With
  i.SetFrmArticle issuel, attl, "text"
  i.ShowFrmArticle conf
  If frmArticle.flagOK = True Then
    i.ExitFrmArticle conf, attl, issuel
    teste = m.BuildStartTag("text", conf, , , i)
    MsgBox teste
  End If
  i.EndFrmArticle
  
  Set i = Nothing: Set conf = Nothing: Set issuel = Nothing
  Set attl = Nothing: Set m = Nothing
End Sub

Sub teste4()
  Dim i As New clsInterface, conf As New clsConfig
  Dim issuel As New clsIssueList, attl As New clsAttrList
  Dim m As New clsMarkup
  
  With conf
    .SetFirstHour: .LoadPublicValues
  End With
  With issuel
    .LoadIssue conf
  End With
  With attl
    .LoadAttributes conf
  End With
  i.SetFrmArticle issuel, attl, "article"
  i.ShowFrmArticle conf
  If frmArticle.flagOK = True Then
    i.ExitFrmArticle conf, attl, issuel
    m.InsertTag "article", 6, conf, , , i
  End If
  i.EndFrmArticle
  
  Set i = Nothing: Set conf = Nothing: Set issuel = Nothing
  Set attl = Nothing: Set m = Nothing
End Sub

Sub teste5()
  Dim test As range
  '--
  ActiveDocument.Select
  With selection
    If .start = .End Then
      MsgBox "select the text"
    Else
      Set test = ActiveDocument.range(start:=.start, End:=.End)
    End If
  End With
  'a melhor forma para obter as posicoes inicial e final de uma selecao
  'e usando o esquema acima. E' o mais rapido testado ate agora.
End Sub

Sub teste6()
  Dim listbar As New clsListBar, conf As New clsConfig
  Dim st As Long, iRange As Long, fRange As Long, tRange As Long
  Dim tag As String, text As String
  Dim iDel As Long, fDel As Long, i As Long, ok1 As Boolean
  Dim ok As Boolean, pilha As New collection, coord As New collection
  '----------------
  conf.LoadPublicValues
  listbar.LoadBars conf
  '---
  ok = False
  With selection
    If .start = .End Then
      MsgBox conf.msgDeleting, vbCritical + vbOKOnly, conf.titleDelete
    Else
      tag = Trim$(selection.text)
      If listbar.FoundTag(tag) = False Then
        MsgBox conf.msgDeleting, vbCritical + vbOKOnly, conf.titleDelete
      Else
        iRange = .start: st = iRange - 1: .start = .End
        selection.find.ClearFormatting
        With selection.find
          .text = conf.ETAGO & tag & conf.TAGC
          .Replacement.text = ""
          .forward = True
          .Wrap = wdFindStop
          .Format = False
          .MatchCase = False
          .MatchWholeWord = False
          .MatchWildcards = False
          .MatchSoundsLike = False
          .MatchAllWordForms = False
        End With
        selection.find.Execute
        If selection.find.found = False Then
          MsgBox conf.msgDeleting, vbCritical + vbOKOnly, conf.titleDelete
        Else
          tRange = .End
          While st < tRange
            With ActiveDocument
              text = .range(start:=st, End:=st + 1).text
              Select Case text
                Case conf.STAGO
                  ok1 = True
                  iDel = st: iRange = st + 1
                Case conf.TAGC
                  ok1 = False
                  fDel = st + 1
                  If ok = False Then
                    fRange = st
                  End If
                  coord.add iDel: coord.add fDel
                  tag = .range(start:=iRange, End:=fRange).text
                  If listbar.FoundTag(tag) = True Then
                    pilha.add coord
                    Set coord = Nothing
                  End If
                  tag = Empty
                  ok = False
                Case Space(1)
                  If ok = False And ok1 = True Then
                    fRange = st
                    ok = True
                  End If
                Case conf.slash
                  iRange = st + 1
              End Select
              st = st + 1
            End With
          Wend
          With pilha
            If pilha.count > 0 Then
              For i = .count To 1 Step -1
                Set coord = .Item(i)
                With coord
                  ActiveDocument.range(start:=.Item(1), End:=.Item(2)).Delete
                End With
              Next i
            End If
          End With
        End If
      End If
    End If
  End With
  '--
  Set conf = Nothing: Set listbar = Nothing
  Set pilha = Nothing: Set coord = Nothing
End Sub

Sub teste07()
  Dim conf As New clsConfig, listbar As New clsListBar
  Dim m As New clsMarkup, ok As Boolean
  '---
  conf.LoadPublicValues
  listbar.LoadBars conf
  
  ok = m.DeleteTag(conf, listbar)
  '---
  Set conf = Nothing: Set listbar = Nothing: Set m = Nothing
End Sub

Sub teste09()
  Dim m As New clsMarkup, issuel As New clsIssueList
  Dim conf As New clsConfig, listbar As New clsListBar
  Dim linkl As New clsLkList, listattr As New clsAttrList
  Dim i As New clsInterface
  '------------------------
  conf.LoadPublicValues
  listbar.LoadBars conf
  linkl.LoadLink conf
  listattr.LoadAttributes conf
  issuel.LoadIssue conf
  '--------------------
  m.ChangeAttribute conf, listbar, linkl, listattr, i, issuel
  
  Set m = Nothing: Set conf = Nothing: Set listbar = Nothing
  Set linkl = Nothing: Set listattr = Nothing
  Set i = Nothing: Set issuel = Nothing
End Sub

Sub teste10()
  Dim iRange As Long, fRange As Long
  Dim ok As Boolean, text As String, continue As Boolean
  Dim conf As New clsConfig
  Dim tag As String 'tag a ser inserida
  '-----------------
  '-----
  conf.LoadPublicValues
  '-----
  On Error Resume Next
  ok = True: continue = False
  With selection
    iRange = .start: fRange = .End
  End With
  While ok = True And continue = False
    With ActiveDocument
      text = .range(start:=iRange - 1, End:=iRange)
      If err.Number <> 0 Then
        ok = False
      Else
        Select Case text
          Case conf.STAGO
            ok = False
          Case conf.TAGC
            continue = True
          Case conf.slash
            ok = False
          Case Else
            iRange = iRange - 1
        End Select
      End If
    End With
  Wend
  If ok = False Then
    If err.Number <> 0 And tag = "article" And tag = "text" Then
      ok = True
    End If
  Else
    continue = False
    While ok = True And continue = False
      With ActiveDocument
        text = .range(start:=fRange, End:=fRange + 1)
        If err.Number <> 0 Then
          ok = False
        Else
          Select Case text
            Case conf.STAGO
              continue = True
            Case conf.TAGC
              ok = False
            Case conf.slash
              ok = False
            Case Else
              fRange = fRange + 1
          End Select
        End If
      End With
    Wend
  End If
  
  MsgBox str(ok) + Space(1) + str(continue)
  Set conf = Nothing
End Sub

Sub teste11()
  Dim conf As New clsConfig, m As New clsMarkup, ok As Boolean
  '-------
  conf.LoadPublicValues
  '-------
  'If m.VerifyInsertInto(conf) = True Then
    MsgBox "Pode inserir"
  'Else
    MsgBox "N�o pode inserir!"
  'End If
  Set conf = Nothing: Set m = Nothing
End Sub

Sub teste12()
  Dim iRange As Long, fRange As Long, startText As String
  Dim iFind As Long, fFind As Long, finishText As String
  Dim conf As New clsConfig, okSLASH As Boolean
  Dim listbar As New clsListBar, bar As New clsBar
  Dim button As New clsButton
  Dim currentBar As String, barName As String
  '---------------------------------
  Dim m As New clsMarkup
  '--------------------
  currentBar = "front"
  conf.LoadPublicValues
  listbar.LoadBars conf
  Set bar = listbar.ReturnBar(currentBar)
  '--------------------
  m.DisableScreen
  With selection
    iRange = .start: fRange = .End
  End With
  selection.find.ClearFormatting
  With selection.find
    .text = conf.TAGC: .Replacement.text = "": .forward = False
    .Wrap = wdFindStop: .Format = False: .MatchCase = False
    .MatchWholeWord = False: .MatchWildcards = False
    .MatchSoundsLike = False: .MatchAllWordForms = False
  End With
  selection.find.Execute
  If selection.find.found = True Then
    With selection
      fFind = .start: .End = .start
    End With
    selection.find.ClearFormatting
    With selection.find
      .text = conf.STAGO: .Replacement.text = "": .forward = False
      .Wrap = wdFindStop: .Format = False: .MatchCase = False
      .MatchWholeWord = False: .MatchWildcards = False
      .MatchSoundsLike = False: .MatchAllWordForms = False
    End With
    selection.find.Execute
    If selection.find.found = True Then
      With selection
        iFind = selection.End: .start = .End
      End With
      With ActiveDocument
        If .range(start:=iFind, End:=iFind + 1).text = conf.slash Then
          finishText = .range(start:=iFind + 1, End:=fFind).text
          okSLASH = True
        Else
          startText = .range(start:=iFind, End:=fFind).text
          If InStr(startText, Space(1)) <> 0 Then
            startText = Mid$(startText, 1, InStr(startText, Space(1)) - 1)
          End If
          okSLASH = False
        End If
      End With
      If okSLASH = True Then
        Set button = bar.ReturnButton(finishText)
        If button.GetTag = Empty Then
          MsgBox "erro"
        Else
          selection.find.ClearFormatting
          With selection.find
            .text = conf.STAGO: .Replacement.text = "": .forward = True
            .Wrap = wdFindStop: .Format = False: .MatchCase = False
            .MatchWholeWord = False: .MatchWildcards = False
            .MatchSoundsLike = False: .MatchAllWordForms = False
          End With
          selection.find.Execute
          If selection.find.found = True Then
            With selection
              iFind = .End: .start = .End
              With ActiveDocument
                If .range(start:=iFind, End:=iFind + 1).text = conf.slash Then
                  'finishText = .Range(start:=iFind + 1, End:=fFind).text
                  okSLASH = True
                Else
                  'startText = .Range(start:=iFind, End:=fFind).text
                  okSLASH = False
                End If
              End With
            End With
            selection.find.ClearFormatting
            With selection.find
              .text = conf.TAGC: .Replacement.text = "": .forward = True
              .Wrap = wdFindStop: .Format = False: .MatchCase = False
              .MatchWholeWord = False: .MatchWildcards = False
              .MatchSoundsLike = False: .MatchAllWordForms = False
            End With
            selection.find.Execute
            If selection.find.found = True Then
              With selection
                fFind = .start: .End = .start
              End With
              If okSLASH = True Then
                With ActiveDocument
                  finishText = .range(start:=iFind + 1, End:=fFind).text
                End With
                With listbar
                  barName = bar.GetName
                  Set bar = .ReturnBar(bar.getUpLevel)
                  With bar
                    Set button = .ReturnButton(finishText)
                    If button.GetTag = Empty Then
                      MsgBox "erro"
                    Else
                      If button.GetDownLevel = barName Then
                        MsgBox "ok"
                      Else
                        MsgBox "erro"
                      End If
                    End If
                  End With
                End With
              Else
                With ActiveDocument
                  startText = .range(start:=iFind, End:=fFind).text
                  If InStr(startText, Space(1)) <> 0 Then
                    startText = Mid$(startText, 1, InStr(startText, Space(1)) - 1)
                  End If
                End With
                With bar
                  Set button = .ReturnButton(startText)
                  If button.GetTag <> Empty Then
                    MsgBox "erro"
                  Else
                    MsgBox "ok"
                  End If
                End With
              End If
            Else
              MsgBox "erro"
            End If
          Else
            MsgBox "erro"
          End If
        End If
      Else
        With listbar
          barName = bar.GetName
          Set bar = .ReturnBar(bar.getUpLevel)
        End With
        With bar
          Set button = .ReturnButton(startText)
        End With
        If button.GetTag = Empty Then
          MsgBox "ERRO"
        Else
          If button.GetDownLevel = barName Then
            selection.find.ClearFormatting
            With selection.find
              .text = conf.STAGO: .Replacement.text = "": .forward = True
              .Wrap = wdFindStop: .Format = False: .MatchCase = False
              .MatchWholeWord = False: .MatchWildcards = False
              .MatchSoundsLike = False: .MatchAllWordForms = False
            End With
            selection.find.Execute
            If selection.find.found = True Then
              With selection
                iFind = .End: .start = .End
                With ActiveDocument
                  If .range(start:=iFind, End:=iFind + 1).text = conf.slash Then
                    'finishText = .Range(start:=iFind + 1, End:=fFind).text
                    okSLASH = True
                  Else
                    'startText = .Range(start:=iFind, End:=fFind).text
                    okSLASH = False
                  End If
                End With
              End With
              selection.find.ClearFormatting
              With selection.find
                .text = conf.TAGC: .Replacement.text = "": .forward = True
                .Wrap = wdFindStop: .Format = False: .MatchCase = False
                .MatchWholeWord = False: .MatchWildcards = False
                .MatchSoundsLike = False: .MatchAllWordForms = False
              End With
              selection.find.Execute
              If selection.find.found = True Then
                With selection
                  fFind = .start: .End = .start
                End With
                If okSLASH = True Then
                  With ActiveDocument
                    finishText = .range(start:=iFind + 1, End:=fFind).text
                  End With
                  With bar
                    Set button = .ReturnButton(finishText)
                  End With
                  If button.GetTag = Empty Then
                    MsgBox "ERRO"
                  Else
                    If button.GetDownLevel = barName Then
                      MsgBox "OK"
                    Else
                      MsgBox "ERRO"
                    End If
                  End If
                Else
                  With ActiveDocument
                    startText = .range(start:=iFind, End:=fFind).text
                    If InStr(startText, Space(1)) <> 0 Then
                      startText = Mid$(startText, 1, InStr(startText, Space(1)) - 1)
                    End If
                  End With
                  With listbar
                    Set bar = .ReturnBar(currentBar)
                  End With
                  With bar
                    Set button = .ReturnButton(startText)
                    If button.GetTag = Empty Then
                      MsgBox "ERRO"
                    Else
                      MsgBox "OK"
                    End If
                  End With
                End If
              End If
            End If
          Else
            MsgBox "ERRO"
          End If
        End If
      End If
    Else
      MsgBox "erro"
    End If
  Else
    MsgBox "ok"
  End If
  With selection
    .start = iRange
    .End = iRange
  End With
  m.EnableScreen
  '-----------------
  Set conf = Nothing: Set listbar = Nothing
  Set bar = Nothing: Set button = Nothing
  Set m = Nothing
End Sub

Sub teste13()
  Dim m As New clsMarkup, listbar As New clsListBar
  Dim conf As New clsConfig, ok As Boolean
  '-----------------
  conf.LoadPublicValues
  listbar.LoadBars conf
  ok = m.VerifyHierarchy(conf, listbar, "other", "head")
  MsgBox str$(ok)
  '--------------
  Set m = Nothing: Set listbar = Nothing: Set conf = Nothing
End Sub

Sub teste14()
  Dim conf As New clsConfig, m As New clsMarkup, attl As New clsAttrList
  Dim i As New clsInterface
  '------------------------
  conf.LoadPublicValues
  conf.SetFirstHour
  attl.LoadAttributes conf
  i.SetPositionFrms conf
  m.BuildLog conf, attl
  Set conf = Nothing: Set m = Nothing: Set attl = Nothing: Set i = Nothing
End Sub

Sub teste15()
  Dim conf As New clsConfig, listbar As New clsListBar
  Dim bar As New clsBar, button As New clsButton
  Dim m As New clsMarkup
  '----
  conf.LoadPublicValues
  With listbar
    .LoadBars conf
    .CreateBars conf
    Set bar = .ReturnBar("article")
  End With
  With m
    .DisplayBar bar.GetName, True
  End With
  Set button = bar.ReturnButton("front")
  m.downLevel bar, button
  Set bar = listbar.ReturnBar(button.GetDownLevel)
  m.UpLevel bar
  '----
  listbar.KillBars
  Set conf = Nothing: Set listbar = Nothing
  Set bar = Nothing: Set button = Nothing
  Set m = Nothing
End Sub

Sub teste16()
  Dim posB As Long, posw As Long
  '---
  'CommandBars("AutoText").Visible = True
  posw = 808 / 2
  posB = CommandBars("standard").Width
  CommandBars("standard").Position = msoBarBottom
  CommandBars("standard").Left = posw - (posB / 2)
End Sub

Sub teste17()
  'key$ = "HKEY_LOCAL_MACHINE\SOFTWARE\IBM\VoiceType\Control\Directories"
  'A BARRA MARKUP E' PERMANENTE E PERTENCENTE AO SISTEMA
  CommandBars("MARKUP").Protection = msoBarNoChangeVisible
  CommandBars("Markup").Visible = False
End Sub

Sub teste18()
  Const projdir = "C:\Scielo\Bin\Markup\"
  Const defaultFile = "default.mds"
  Dim language As String, capBut As String, f As Integer
  '--------------------------------
  f = FreeFile
  Open projdir & defaultFile For Input As #f
  Input #f, aux, language
  Close #f
  Dim b As CommandBarPopup
  With CommandBars("Menu Bar").Controls
    .add Type:=msoControlPopup, Before:=.count + 1
    Set b = .Item(.count)
    With b
      Select Case language
        Case "en"
          capBut = "Markup"
        Case "pt"
          capBut = "Marcacao"
        Case "sp"
          capBut = "Marcacion"
      End Select
      .Caption = capBut
      .BeginGroup = True
      With .CommandBar.Controls
        .add Type:=msoControlButton
        With .Item(.count)
          .Caption = "Markup DTD-Scielo 2.0"
          .TooltipText = "Start Markup"
          .OnAction = "MainModule.Main"
        End With
        .add Type:=msoControlButton
        With .Item(.count)
          Select Case language
            Case "en"
              capBut = "Configuration"
            Case "pt"
              capBut = "Configuracao"
            Case "sp"
              capBut = "Configuracion"
          End Select
          .Caption = capBut
          .TooltipText = "Setup"
          .OnAction = "MainModule.MainConfig"
        End With
      End With
    End With
  End With
  Set b = Nothing
End Sub

Sub teste19()
  With CommandBars("Menu Bar").Controls
    .Item(.count).Delete
  End With
End Sub

Sub teste20()
  'CommandBars("ifloat").Protection = msoBarNoMove + msoBarNoChangeVisible
  'CommandBars("ifloat").Protection = msoBarNoCustomize
  'CommandBars("ifloat").Left = 770
  'CommandBars("aff").Protection = msoBarNoMove + msoBarNoChangeVisible
  'CommandBars("aff").Protection = msoBarNoCustomize
  'CommandBars("aff").Left = 770
  'CommandBars("aff").Visible = True
  'CommandBars("markup").Protection = msoBarNoChangeVisible
  p = CommandBars("imonog").Top
End Sub

Sub teste21()
  Dim m As New clsMarkup, conf As New clsConfig, listbar As New clsListBar
  
  conf.LoadPublicValues
  listbar.LoadBars conf
  'm.ChangeSTAGO_TAGC conf, listBar
  
  Set m = Nothing: Set conf = Nothing: Set listbar = Nothing
End Sub

Sub teste22()
  s = ActiveDocument.SaveFormat
End Sub

Sub teste23()
  t = "[article pii=nd doctopic=sc language=pt ccode=br1.1 status=1 version=2.0 type=map order=12 seccode=BJMBR090 stitle=" & Chr(34) & "Braz J Med Biol Res" & Chr(34) & "volid=30 issueno=1 dateiso=19970100 pages=" & Chr(34) & "111-122,120-121" & Chr(34) & "issn=0100-879X]"
  i = InStr(t, "stitle=") + 7
  j = InStr(t, "volid=")
  text = Trim$(Mid$(t, i, j - i))
  If InStr(text, Chr(34)) <> 0 Then
    text = Mid$(text, 2, Len(text) - 2)
  End If
End Sub

Sub teste25()
  Dim conf As New clsConfig, inter As New clsInterface
  conf.LoadPublicValues
  inter.BuildMarkupBar conf
  Set conf = Nothing: Set inter = Nothing
End Sub

Sub teste26()
  CommandBars("HideFrm").Protection = msoBarNoChangeVisible
End Sub

Sub teste27()
  With CommandBars("HideFrm").Controls
    .Item(1).TooltipText = "<="
  End With
End Sub

Sub teste28()
  CommandBars("hide").Visible = False
  
End Sub

Sub teste29()
  MsgBox ActiveDocument.SaveFormat
End Sub

Sub teste30()
  Dim Conv As New clsConv
  '----------------------
  Conv.Conversor10_20
  
  Set dics = Nothing
End Sub

Sub teste31()
  With CommandBars("hide")
    t = .Top
    l = .Left
    .Protection = msoBarNoChangeVisible + msoBarNoMove + msoBarNoResize
    '.Protection = msoBarNoProtection
  End With
End Sub

Sub teste32()
  Dim conf As New clsConfig, ret As Long
  
  conf.LoadPublicValues
  ret = Shell(conf.parser, vbMaximizedFocus)
  MsgBox "voltou!"
  Set conf = Nothing
End Sub

Sub teste33()
  Dim m As New clsMarkup
  '-
  text = m.BuildFilePathName("C:\Scielo\Bin\Markup\v2.0\conv\v3.2.1\renato.h", "txt")
  MsgBox text
  Set m = Nothing
End Sub

Sub teste34()
  With CommandBars("startup")
    .Visible = True
  End With
End Sub

Sub teste35()
  CommandBars("hide").Protection = msoBarNoChangeVisible + msoBarNoMove + msoBarNoResize
End Sub

Sub teste36()
  MsgBox DateValueTest("19121231")
End Sub

Public Function DateValueTest(d As String) As Boolean
  Dim day As Integer, mes As Integer, ano As Integer
  Dim anoS As Integer
  Const errIDMet As String = "12"
  '-----------------------------
  On Error GoTo errLOG
  
  DateValueTest = True
  ano = val(Mid$(d, 1, 4))
  mes = val(Mid$(d, 5, 2))
  dia = val(Mid$(d, 7, 2))
  '-
  anoS = val(Mid$(Format(Date, "yyyymmdd"), 1, 4))
  '-
  If (ano < 1000 Or ano > anoS) And ano <> 0 Then
    DateValueTest = False
  ElseIf mes > 12 Then
    DateValueTest = False
  ElseIf dia > 31 Then
    DateValueTest = False
  Else
    Select Case dia
        Case 29
            If mes = 2 Then
                If (ano Mod 100) = 0 Then
                    If (ano Mod 400) <> 0 Then
                        DateValueTest = False
                    End If
                ElseIf (ano Mod 4) <> 0 Then
                    DateValueTest = False
                End If
            End If
        Case 30
            If mes = 2 Then
                DateValueTest = False
            End If
        Case 31
            Select Case mes
                Case 2, 4, 6, 9, 11
                    DateValueTest = False
            End Select
    End Select
  End If
  Exit Function
errLOG:
  Dim conf As New clsConfig
  With mErr
    conf.LoadPublicValues
    .LoadErr conf
    .BuildLog errIDObj & errIDMet, conf
  End With
  Set conf = Nothing
End Function
