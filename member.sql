CREATE TABLE `member` (
  `memNo` int(11) NOT NULL,
  `memName` varchar(30) DEFAULT NULL,
  `memId` varchar(30) DEFAULT NULL,
  `memImg` varchar(255) DEFAULT NULL,
  `memMail` varchar(50) DEFAULT NULL,
  `memTel` varchar(15) DEFAULT NULL,
  `memPsw` varchar(20) DEFAULT NULL,
  `memPoint` int(11) DEFAULT '0',
  `memStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memNo`, `memName`, `memId`, `memImg`, `memMail`, `memTel`, `memPsw`, `memPoint`, `memStatus`) VALUES
(1, '文森', 'Vincent', '1.jpg', '1@', '0912394488', '1', 250, 1),
(2, '米津玄師', 'Lemon', '2.jpg', 'a124@gmail.com', '0912394488', '456', 3000, 1),
(3, '周杰倫', 'Jay', '3.jpg', 'a125@gmail.com', '0913234432', '789', 3000, 1),
(4, '羽生結弦', '維尼', '4.jpg', 'a126@gmail.com', '0912396666', 'abc', 100, 1),
(5, '蔡依林', 'Jolin', '5.jpg', 'a127@gmail.com', '0912393588', 'def', 5000, 1),
(6, '福爾摩斯', '夏洛克', '6.jpg', 'a128@gmail.com', '0912288434', 'qwe', 300, 1),
(7, '華生', '約翰', '7.jpg', 'a129@gmail.com', '0923443537', 'asd', 1100, 1),
(8, '權志龍', 'GD', '8.jpg', '2@', '0912324553', '1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
