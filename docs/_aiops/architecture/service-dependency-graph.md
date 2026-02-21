flowchart TD
  subgraph Inputs
    Docs[/docs/**/]
    App[app/**]
    Logs[writable/logs/]
    Audit[writable/audit/]
    Env[.env]
  end

  subgraph Discovery
    DS[DocsScannerService]
    CS[CellDiscoveryScanner]
    CH[CommandHookService]
  end

  subgraph Observability
    OS[ObservabilityStateService]
    FP[FingerprintService]
    RE[RegressionEvaluator]
  end

  subgraph Governance
    GS[GovernanceScorer]
    TI[TargetingIntelligence]
    BL[BranchLockService]
  end

  subgraph Planning
    DR[DependencyResolver]
    DB[DiffBuilder]
    DD[DeduplicationService]
  end

  subgraph LLM
    OCG[OllamaCodeGenService]
    OPR[OllamaPatchRunner]
    PJ[PatchJob]
    PR[PatchResult]
  end

  subgraph Publishing
    PRC[PRComposerService]
    GPR[GitHubPRService]
    RN[ReleaseNotesService]
  end

  Docs --> DS
  App --> CS
  App --> CH
  Logs --> OS
  Audit --> OS
  Env --> GS
  Env --> BL

  DS --> TI
  CS --> TI
  CH --> GS
  OS --> FP --> RE

  RE --> GS
  GS --> TI
  BL --> DR
  TI --> DR --> DB --> DD

  DB --> PJ --> OPR --> PR
  DB --> OCG --> DB

  PR --> PRC --> GPR
  GS --> PRC
  RE --> PRC
  DB --> RN --> PRC